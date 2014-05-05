<?php

/**
 * Mock interface to enable code completion for Zend view helpers.
 *
 * @license New BSD License @see LICENSE.md
 * @author Janos Pasztor <j.pasztor@ixolit.com>
 * @copyright Copyright (c) 2014 Ixolit New Media Development GmbH. All Rights Reserved
 */
interface Ixo_ZendViewInterface extends Zend_View_Interface, Ixo_ZendNavigationViewInterface {
	/**
	 * Generates a set of radio button elements.
	 *
	 * @access public
	 *
	 * @param string|array $name If a string, the element name.  If an
	 * array, all other parameters are ignored, and the array elements
	 * are extracted in place of added parameters.
	 *
	 * @param mixed $value The radio value to mark as 'checked'.
	 *
	 * @param array $options An array of key-value pairs where the array
	 * key is the radio value, and the array value is the radio text.
	 *
	 * @param array|string $attribs Attributes added to each radio.
	 *
	 * @return string The radio buttons XHTML.
	 */
	public function formRadio($name, $value = NULL, $attribs = NULL, $options = NULL, $listsep = "<br />\n");

	/**
	 * Render form errors
	 *
	 * @param  string|array $errors Error(s) to render
	 * @param  array $options
	 * @return string
	 */
	public function formErrors($errors, $options = NULL);

	/**
	 * Generates a 'file' element.
	 *
	 * @access public
	 *
	 * @param string|array $name If a string, the element name.  If an
	 * array, all other parameters are ignored, and the array elements
	 * are extracted in place of added parameters.
	 *
	 * @param array $attribs Attributes for the element tag.
	 *
	 * @return string The element XHTML.
	 */
	public function formFile($name, $attribs = NULL);

	/**
	 * Renders a template fragment within a variable scope distinct from the
	 * calling View object.
	 *
	 * If no arguments are provided, returns object instance.
	 *
	 * @param  string $name Name of view script
	 * @param  string|array $module If $model is empty, and $module is an array,
	 *                              these are the variables to populate in the
	 *                              view. Otherwise, the module in which the
	 *                              partial resides
	 * @param  array $model Variables to populate in the view
	 * @return string
	 */
	public function partialLoop($name = NULL, $module = NULL, $model = NULL);

	/**
	 * Helper method: retrieve or set UserAgent instance
	 *
	 * @param  null|Zend_Http_UserAgent $userAgent
	 * @return Zend_Http_UserAgent
	 */
	public function userAgent(Zend_Http_UserAgent $userAgent = NULL);

	/**
	 * Generates a set of checkbox button elements.
	 *
	 * @access public
	 *
	 * @param string|array $name If a string, the element name.  If an
	 * array, all other parameters are ignored, and the array elements
	 * are extracted in place of added parameters.
	 *
	 * @param mixed $value The checkbox value to mark as 'checked'.
	 *
	 * @param array $options An array of key-value pairs where the array
	 * key is the checkbox value, and the array value is the radio text.
	 *
	 * @param array|string $attribs Attributes added to each radio.
	 *
	 * @return string The radio buttons XHTML.
	 */
	public function formMultiCheckbox($name, $value = NULL, $attribs = NULL, $options = NULL, $listsep = "<br />\n");

	/**
	 * Return InlineScript object
	 *
	 * Returns InlineScript helper object; optionally, allows specifying a
	 * script or script file to include.
	 *
	 * @param  string $mode Script or file
	 * @param  string $spec Script/url
	 * @param  string $placement Append, prepend, or set
	 * @param  array $attrs Array of script attributes
	 * @param  string $type Script type and/or array of script attributes
	 * @return Zend_View_Helper_InlineScript
	 */
	public function inlineScript($mode = 'FILE', $spec = NULL, $placement = 'APPEND', $attrs = array(), $type = 'text/javascript');

	/**
	 * Generates a 'reset' button.
	 *
	 * @access public
	 *
	 * @param string|array $name If a string, the element name.  If an
	 * array, all other parameters are ignored, and the array elements
	 * are extracted in place of added parameters.
	 *
	 * @param mixed $value The element value.
	 *
	 * @param array $attribs Attributes for the element tag.
	 *
	 * @return string The element XHTML.
	 */
	public function formReset($name = '', $value = 'Reset', $attribs = NULL);

	/**
	 * Generates a 'password' element.
	 *
	 * @access public
	 *
	 * @param string|array $name If a string, the element name.  If an
	 * array, all other parameters are ignored, and the array elements
	 * are extracted in place of added parameters.
	 *
	 * @param mixed $value The element value.
	 *
	 * @param array $attribs Attributes for the element tag.
	 *
	 * @return string The element XHTML.
	 */
	public function formPassword($name, $value = NULL, $attribs = NULL);

	/**
	 * Translate a message
	 * You can give multiple params or an array of params.
	 * If you want to output another locale just set it as last single parameter
	 * Example 1: translate('%1\$s + %2\$s', $value1, $value2, $locale);
	 * Example 2: translate('%1\$s + %2\$s', array($value1, $value2), $locale);
	 *
	 * @param  string $messageid Id of the message to be translated
	 * @return string|Zend_View_Helper_Translate Translated message
	 */
	public function translate($messageid = NULL);

	/**
	 * Generate a link or image tag pointing to tinysrc.net
	 *
	 * @param mixed $image
	 * @param array $options
	 * @return void
	 */
	public function tinySrc($image = NULL, $options = array());

	/**
	 * Retrieve placeholder for title element and optionally set state
	 *
	 * @param  string $title
	 * @param  string $setType
	 * @return Zend_View_Helper_HeadTitle
	 */
	public function headTitle($title = NULL, $setType = NULL);

	/**
	 * Returns an avatar from gravatar's service.
	 *
	 * $options may include the following:
	 * - 'img_size' int height of img to return
	 * - 'default_img' string img to return if email adress has not found
	 * - 'rating' string rating parameter for avatar
	 * - 'secure' bool load from the SSL or Non-SSL location
	 *
	 * @see    http://pl.gravatar.com/site/implement/url
	 * @see    http://pl.gravatar.com/site/implement/url More information about gravatar's service.
	 * @param  string|null $email Email adress.
	 * @param  null|array $options Options
	 * @param  array $attribs Attributes for image tag (title, alt etc.)
	 * @return Zend_View_Helper_Gravatar
	 */
	public function gravatar($email = '', $options = array(), $attribs = array());

	/**
	 * Generates a 'label' element.
	 *
	 * @param  string $name The form element name for which the label is being generated
	 * @param  string $value The label text
	 * @param  array $attribs Form element attributes (used to determine if disabled)
	 * @return string The element XHTML.
	 */
	public function formLabel($name, $value = NULL, $attribs = NULL);

	/**
	 * Helper entry point
	 *
	 * @param  Zend_Navigation_Container $container  [optional] container to
	 *                                               operate on
	 * @return Zend_View_Helper_Navigation           fluent interface, returns
	 *                                               self
	 */
	public function navigation(Zend_Navigation_Container $container = NULL);

	/**
	 * Render HTML form
	 *
	 * @param  string $name Form name
	 * @param  string $content Form content
	 * @param  array $attribs HTML form attributes
	 * @return string
	 */
	public function fieldset($name, $content, $attribs = NULL);

	/**
	 * Generates a 'text' element.
	 *
	 * @access public
	 *
	 * @param string|array $name If a string, the element name.  If an
	 * array, all other parameters are ignored, and the array elements
	 * are used in place of added parameters.
	 *
	 * @param mixed $value The element value.
	 *
	 * @param array $attribs Attributes for the element tag.
	 *
	 * @return string The element XHTML.
	 */
	public function formText($name, $value = NULL, $attribs = NULL);

	/**
	 * Generates an url given the name of a route.
	 *
	 * @access public
	 *
	 * @param  array $urlOptions Options passed to the assemble method of the Route object.
	 * @param  mixed $name The name of a Route to use. If null it will use the current Route
	 * @param  bool $reset Whether or not to reset the route defaults with those provided
	 * @return string Url for the link href attribute.
	 */
	public function url($urlOptions = array(), $name = NULL, $reset = false, $encode = true);

	/**
	 * Output a formatted currency
	 *
	 * @param  integer|float            $value    Currency value to output
	 * @param  string|Zend_Locale|array $currency OPTIONAL Currency to use for
	 *                                            this call
	 * @return string Formatted currency
	 */
	public function currency($value = NULL, $currency = NULL);

	/**
	 * Helper to show a "note" based on a hidden value.
	 *
	 * @access public
	 *
	 * @param string|array $name If a string, the element name.  If an
	 * array, all other parameters are ignored, and the array elements
	 * are extracted in place of added parameters.
	 *
	 * @param array $value The note to display.  HTML is *not* escaped; the
	 * note is displayed as-is.
	 *
	 * @return string The element XHTML.
	 */
	public function formNote($name, $value = NULL);

	/**
	 * Output a html object tag
	 *
	 * @param string $data The html url
	 * @param array  $attribs Attribs for the object tag
	 * @param array  $params Params for in the object tag
	 * @param string $content Alternative content
	 * @return string
	 */
	public function htmlPage($data, $attribs = array(), $params = array(), $content = NULL);

	/**
	 * Render HTML form
	 *
	 * @param  string $name Form name
	 * @param  null|array $attribs HTML form attributes
	 * @param  false|string $content Form content
	 * @return string
	 */
	public function form($name, $attribs = NULL, $content = false);

	/**
	 * Renders a template and stores the rendered output as a placeholder
	 * variable for later use.
	 *
	 * @param string $script The template script to render
	 * @param string $placeholder The placeholder variable name in which to store the rendered output
	 * @return void
	 */
	public function renderToPlaceholder($script, $placeholder);

	/**
	 * Add elements to alternate
	 *
	 * @param array $data
	 * @param string $name
	 * @return Zend_View_Helper_Cycle
	 */
	public function cycle($data = array(), $name = 'default');

	/**
	 * Output a flash movie object tag
	 *
	 * @param string $data The flash file
	 * @param array  $attribs Attribs for the object tag
	 * @param array  $params Params for in the object tag
	 * @param string $content Alternative content
	 * @return string
	 */
	public function htmlFlash($data, $attribs = array(), $params = array(), $content = NULL);

	/**
	 * Generates a 'List' element.
	 *
	 * @param array   $items   Array with the elements of the list
	 * @param boolean $ordered Specifies ordered/unordered list; default unordered
	 * @param array   $attribs Attributes for the ol/ul tag.
	 * @return string The list XHTML.
	 */
	public function htmlList($items, $ordered = false, $attribs = false, $escape = true);

	/**
	 * headLink() - View Helper Method
	 *
	 * Returns current object instance. Optionally, allows passing array of
	 * values to build link.
	 *
	 * @return Zend_View_Helper_HeadLink
	 */
	public function headLink($attributes = NULL, $placement = 'APPEND');

	/**
	 * Retrieve object instance; optionally add meta tag
	 *
	 * @param  string $content
	 * @param  string $keyValue
	 * @param  string $keyType
	 * @param  array $modifiers
	 * @param  string $placement
	 * @return Zend_View_Helper_HeadMeta
	 */
	public function headMeta($content = NULL, $keyValue = NULL, $keyType = 'name', $modifiers = array(), $placement = 'APPEND');

	/**
	 * Placeholder helper
	 *
	 * @param  string $name
	 * @return Zend_View_Helper_Placeholder_Container_Abstract
	 */
	public function placeholder($name);

	/**
	 * Retrieve rendered contents of a controller action
	 *
	 * If the action results in a forward or redirect, returns empty string.
	 *
	 * @param  string $action
	 * @param  string $controller
	 * @param  string $module Defaults to default module
	 * @param  array $params
	 * @return string
	 */
	public function action($action, $controller, $module = NULL, $params = array());

	/**
	 * Generates a 'checkbox' element.
	 *
	 * @access public
	 *
	 * @param string|array $name If a string, the element name.  If an
	 * array, all other parameters are ignored, and the array elements
	 * are extracted in place of added parameters.
	 * @param mixed $value The element value.
	 * @param array $attribs Attributes for the element tag.
	 * @return string The element XHTML.
	 */
	public function formCheckbox($name, $value = NULL, $attribs = NULL, $checkedOptions = NULL);

	/**
	 * Generates 'select' list of options.
	 *
	 * @access public
	 *
	 * @param string|array $name If a string, the element name.  If an
	 * array, all other parameters are ignored, and the array elements
	 * are extracted in place of added parameters.
	 *
	 * @param mixed $value The option value to mark as 'selected'; if an
	 * array, will mark all values in the array as 'selected' (used for
	 * multiple-select elements).
	 *
	 * @param array|string $attribs Attributes added to the 'select' tag.
	 * the optional 'optionClasses' attribute is used to add a class to
	 * the options within the select (associative array linking the option
	 * value to the desired class)
	 *
	 * @param array $options An array of key-value pairs where the array
	 * key is the radio value, and the array value is the radio text.
	 *
	 * @param string $listsep When disabled, use this list separator string
	 * between list values.
	 *
	 * @return string The select tag and options XHTML.
	 */
	public function formSelect($name, $value = NULL, $attribs = NULL, $options = NULL, $listsep = "<br />\n");

	/**
	 * Output a quicktime movie object tag
	 *
	 * @param string $data The quicktime file
	 * @param array  $attribs Attribs for the object tag
	 * @param array  $params Params for in the object tag
	 * @param string $content Alternative content
	 * @return string
	 */
	public function htmlQuicktime($data, $attribs = array(), $params = array(), $content = NULL);

	/**
	 * Declare template vars to set default values and avoid notices when using strictVars
	 *
	 * Primarily for use when using {@link Zend_View_Abstract::strictVars() Zend_View strictVars()},
	 * this helper can be used to declare template variables that may or may
	 * not already be set in the view object, as well as to set default values.
	 * Arrays passed as arguments to the method will be used to set default
	 * values; otherwise, if the variable does not exist, it is set to an empty
	 * string.
	 *
	 * Usage:
	 * <code>
	 * $this->declareVars(
	 *     'varName1',
	 *     'varName2',
	 *     array('varName3' => 'defaultValue',
	 *           'varName4' => array()
	 *     )
	 * );
	 * </code>
	 *
	 * @param string|array variable number of arguments, all string names of variables to test
	 * @return void
	 */
	public function declareVars();

	/**
	 * Generates an 'image' element.
	 *
	 * @access public
	 *
	 * @param string|array $name If a string, the element name.  If an
	 * array, all other parameters are ignored, and the array elements
	 * are extracted in place of added parameters.
	 *
	 * @param mixed $value The source ('src="..."') for the image.
	 *
	 * @param array $attribs Attributes for the element tag.
	 *
	 * @return string The element XHTML.
	 */
	public function formImage($name, $value = NULL, $attribs = NULL);

	/**
	 * Return headStyle object
	 *
	 * Returns headStyle helper object; optionally, allows specifying
	 *
	 * @param  string $content Stylesheet contents
	 * @param  string $placement Append, prepend, or set
	 * @param  string|array $attributes Optional attributes to utilize
	 * @return Zend_View_Helper_HeadStyle
	 */
	public function headStyle($content = NULL, $placement = 'APPEND', $attributes = array());

	/**
	 * View helper entry point:
	 * Returns the current host's URL like http://site.com
	 *
	 * @param  string|boolean $requestUri  [optional] if true, the request URI
	 *                                     found in $_SERVER will be appended
	 *                                     as a path. If a string is given, it
	 *                                     will be appended as a path. Default
	 *                                     is to not append any path.
	 * @return string                      server url
	 */
	public function serverUrl($requestUri = NULL);

	/**
	 * Generates a 'textarea' element.
	 *
	 * @access public
	 *
	 * @param string|array $name If a string, the element name.  If an
	 * array, all other parameters are ignored, and the array elements
	 * are extracted in place of added parameters.
	 *
	 * @param mixed $value The element value.
	 *
	 * @param array $attribs Attributes for the element tag.
	 *
	 * @return string The element XHTML.
	 */
	public function formTextarea($name, $value = NULL, $attribs = NULL);

	/**
	 * Generates a 'hidden' element.
	 *
	 * @access public
	 *
	 * @param string|array $name If a string, the element name.  If an
	 * array, all other parameters are ignored, and the array elements
	 * are extracted in place of added parameters.
	 * @param mixed $value The element value.
	 * @param array $attribs Attributes for the element tag.
	 * @return string The element XHTML.
	 */
	public function formHidden($name, $value = NULL, $attribs = NULL);

	/**
	 * Returns site's base url, or file with base url prepended
	 *
	 * $file is appended to the base url for simplicity
	 *
	 * @param  string|null $file
	 * @return string
	 */
	public function baseUrl($file = NULL);

	/**
	 * Generates a 'submit' button.
	 *
	 * @access public
	 *
	 * @param string|array $name If a string, the element name.  If an
	 * array, all other parameters are ignored, and the array elements
	 * are extracted in place of added parameters.
	 *
	 * @param mixed $value The element value.
	 *
	 * @param array $attribs Attributes for the element tag.
	 *
	 * @return string The element XHTML.
	 */
	public function formSubmit($name, $value = NULL, $attribs = NULL);

	/**
	 * Return layout object
	 *
	 * Usage: $this->layout()->setLayout('alternate');
	 *
	 * @return Zend_Layout
	 */
	public function layout();

	/**
	 * Set or retrieve doctype
	 *
	 * @param  string $doctype
	 * @return Zend_View_Helper_Doctype
	 */
	public function doctype($doctype = NULL);

	/**
	 * Render the provided pages.  This checks if $view->paginator is set and,
	 * if so, uses that.  Also, if no scrolling style or partial are specified,
	 * the defaults will be used (if set).
	 *
	 * @param  Zend_Paginator (Optional) $paginator
	 * @param  string $scrollingStyle (Optional) Scrolling style
	 * @param  string $partial (Optional) View partial
	 * @param  array|string $params (Optional) params to pass to the partial
	 * @return string
	 * @throws Zend_View_Exception
	 */
	public function paginationControl(Zend_Paginator $paginator = NULL, $scrollingStyle = NULL, $partial = NULL, $params = NULL);

	/**
	 * Generates a 'button' element.
	 *
	 * @access public
	 *
	 * @param string|array $name If a string, the element name.  If an
	 * array, all other parameters are ignored, and the array elements
	 * are extracted in place of added parameters.
	 *
	 * @param mixed $value The element value.
	 *
	 * @param array $attribs Attributes for the element tag.
	 *
	 * @return string The element XHTML.
	 */
	public function formButton($name, $value = NULL, $attribs = NULL);

}