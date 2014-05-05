<?php
/**
 * Quick and dirty script to generate a code completion interface for your view helpers.
 *
 * Usage:
 *
 *  php generate-helper-interface.php path/to/helpers/ ViewInterfaceName
 *
 * Attention! You have to edit this script to define any constants that are needed for your application!
 */

// Edit this configuration

defined('APPLICATION_PATH')
|| define('APPLICATION_PATH', realpath(dirname(__FILE__) . '/your/app/here'));

set_include_path(implode(PATH_SEPARATOR, array(
	realpath('./your/path/here'),
	get_include_path(),
)));

$applicationIni = '/your/application/config/here.ini';

// Stop editing here

$dir = $_SERVER['argv'][1];
$name = $_SERVER['argv'][2];

$classList = array();
if ($dh = opendir($dir)) {
	while (($file = readdir($dh)) !== false) {
		if (preg_match('/^(?P<class>[a-zA-Z0-9]+)\.php$/', $file, $matches)) {
			$classList[] = $matches['class'];
		}
	}
}

// Define application environment
defined('APPLICATION_ENV')
|| define('APPLICATION_ENV', (getenv('APPLICATION_ENV') ? getenv('APPLICATION_ENV') : 'production'));

// Defines the directory separator for windows or unix env
define('DS', DIRECTORY_SEPARATOR);

// Check whether the apc is loaded
define('APC_EXTENSION_LOADED', extension_loaded('apc') && ini_get('apc.enabled'));


/** Zend_Application */
require_once 'Zend/Application.php';

/** Custom functions to help development */
require_once 'DLF/Utils.php';

// Check whether the config file is cached with apc
$configCached = false;

if(APC_EXTENSION_LOADED && apc_exists($applicationIni)) {
	$applicationIni = apc_fetch($applicationIni);
	$configCached = true;
}

// Create application, bootstrap, and run
$application = new Zend_Application(APPLICATION_ENV, $applicationIni);
$application->bootstrap();

$helperClasses = array();
foreach ($classList as $class) {
	$loadedClasses = get_declared_classes();
	if (!include_once($dir . '/' . $class . '.php')) {
		trigger_error('Failed to load ' . $dir . '/' . $class . '.php', E_USER_WARNING);
	}
	$newClasses = get_declared_classes();
	foreach ($newClasses as $newClass) {
		if (!in_array($newClass, $loadedClasses)) {
			$helperClasses[$class] = $newClass;
		}
	}
}

echo('<?php' . "\n\n");
echo('/**
 * Mock interface to enable code completion for Zend view helpers.
 *
 * Generated: ./generate-helper-interface.php ' . $dir . ' ' . $name . '
 */' . "\n"
);
echo('interface ' . $name . ' extends Zend_View_Interface {' . "\n");
foreach ($helperClasses as $helper => $class) {
	$classReflection = new ReflectionClass($class);
	if ($classReflection->isAbstract()) {
		continue;
	}
	$method = lcfirst($helper);
	if (method_exists($class, $method)) {
		$reflection = new ReflectionMethod($class, $method);
		$doc = $reflection->getDocComment();
		$declaration = "\t";
		$declaration .= preg_replace('/\n +\\*/s', "\n\t *", $doc) . "\n\t";
		if ($reflection->isPrivate()) {
			$declaration .= 'private';
		} else if ($reflection->isProtected()) {
			$declaration .= 'protected';
		} else {
			$declaration .= 'public';
		}
		if ($reflection->isStatic()) {
			$declaration .= ' static';
		}
		$declaration .= ' function ' . $method . '(';
		$params = $reflection->getParameters();
		$paramDeclaration = array();
		foreach ($params as $param) {
			$pDeclaration = '';
			if ($param->getClass()) {
				$pDeclaration .= $param->getClass()->getName() . ' ';
			}
			$pDeclaration .= '$' . $param->getName();
			try {
				$pDeclaration .= ' = ' . str_replace("array (\n)", 'array()', var_export($param->getDefaultValue(), true));
			} catch (ReflectionException $e) {
				try {
					$pDeclaration .= ' = ' . $param->getDefaultValueConstantName();
				} catch (ReflectionException $e) {

				}
			}
			$paramDeclaration[] = $pDeclaration;
		}
		$declaration .= implode(', ', $paramDeclaration);
		$declaration .= ');' . "\n\n";
		echo ($declaration);
	}
}
echo("}\n");
