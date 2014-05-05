<?php

/**
 * Mock interface to enable code completion for Zend view helpers.
 *
 * @license New BSD License @see LICENSE.md
 */
interface Ixo_ZendNavigationViewInterface extends Zend_View_Interface {
	/**
	 * View helper entry point:
	 * Retrieves helper and optionally sets container to operate on
	 *
	 * @param  Zend_Navigation_Container $container     [optional] container to
	 *                                                  operate on
	 * @return Zend_View_Helper_Navigation_Breadcrumbs  fluent interface,
	 *                                                  returns self
	 */
	public function breadcrumbs(Zend_Navigation_Container $container = NULL);

	/**
	 * View helper entry point:
	 * Retrieves helper and optionally sets container to operate on
	 *
	 * @param  Zend_Navigation_Container $container  [optional] container to
	 *                                               operate on
	 * @return Zend_View_Helper_Navigation_Menu      fluent interface,
	 *                                               returns self
	 */
	public function menu(Zend_Navigation_Container $container = NULL);

	/**
	 * View helper entry point:
	 * Retrieves helper and optionally sets container to operate on
	 *
	 * @param  Zend_Navigation_Container $container  [optional] container to
	 *                                               operate on
	 * @return Zend_View_Helper_Navigation_Links     fluent interface, returns
	 *                                               self
	 */
	public function links(Zend_Navigation_Container $container = NULL);

	/**
	 * View helper entry point:
	 * Retrieves helper and optionally sets container to operate on
	 *
	 * @param  Zend_Navigation_Container $container  [optional] container to
	 *                                               operate on
	 * @return Zend_View_Helper_Navigation_Sitemap   fluent interface, returns
	 *                                               self
	 */
	public function sitemap(Zend_Navigation_Container $container = NULL);
}
