<?php
/**
 * Zend Framework
 *
 * LICENSE
 *
 * This source file is subject to the new BSD license that is bundled
 * with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://framework.zend.com/license/new-bsd
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@zend.com so we can send you a copy immediately.
 *
 * @category   Zend
 * @package    Zend_View
 * @copyright  Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license    http://framework.zend.com/license/new-bsd     New BSD License
 * @version    $Id$
 */


/**
 * Interface class for Zend_View compatible template engine implementations
 *
 * @category   Zend
 * @package    Zend_View
 * @copyright  Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license    http://framework.zend.com/license/new-bsd     New BSD License
 *
 * @method string|mixed format() format(string $formaterMethod, $value, array $options = null) this call a format method <br />
 *  - see {@link Virtua_View_Helper_Format} <br />
 *  - Default : {@link Virtua_View_Helper_Format_Default}::METHOD, $formaterMethod = "METHOD"<br />
 *  - Others : [App|Virtua|Calleo|Shop|Cms]_View_Helper_Format_[GROUP]::METHOD, $formaterMethod = "GROUP.METHOD"
 *
 * @method void adorn() adorn(string $adornMethod, $param1 = null, $paramX = null) this call a adorn method <br />
 *  - see {@link Virtua_View_Helper_Adorn} <br />
 *  - Default {@link Virtua_View_Helper_Adorn_Default}::METHOD, $adornMethod = "METHOD"<br />
 *  - Others : [App|Virtua|Calleo|Shop|Cms]_View_Helper_Format_[GROUP]::METHOD, $adornMethod = "GROUP.METHOD"
 *
 * @method Virtua_View_Helper_Config config() config() this get the config Helper instance <br />
 *  - see {@link Virtua_View_Helper_Config} <br />
 *  - Default {@link Virtua_View_Helper_Config}::METHOD, $configMethod = "METHOD"<br />
 *  - Others : [App|Virtua|Calleo|Shop|Cms]_View_Helper_Format_[GROUP]::METHOD, $configMethod = "GROUP.METHOD"
 *
 * @method string currency() currency(string|integer|float $value, $currency) this formats the value with the correct currency <br />
 *  - see {@link Virtua_View_Helper_Currency} <br />
 *  - Default {@link Virtua_View_Helper_Config}::METHOD, $currencyMethod = "METHOD"<br />
 *  - Others : [App|Virtua|Calleo|Shop|Cms]_View_Helper_Format_[GROUP]::METHOD, $currencyMethod = "GROUP.METHOD"
 *
 * @method string dir() dir(string $lang) this adds the dir attribute html code if necessary <br />
 *  - see {@link Virtua_View_Helper_Dir} <br />
 *  - Default {@link Virtua_View_Helper_Dir}::METHOD, $dirMethod = "METHOD"<br />
 *  - Others : [App|Virtua|Calleo|Shop|Cms]_View_Helper_Format_[GROUP]::METHOD, $dirMethod = "GROUP.METHOD"
 *
 * @method Virtua_View_Helper_History history() history() this returns the instance of the history helper <br />
 *  - see {@link Virtua_View_Helper_History} <br />
 *  - Default {@link Virtua_View_Helper_History}::METHOD, $historyMethod = "METHOD"<br />
 *  - Others : [App|Virtua|Calleo|Shop|Cms]_View_Helper_Format_[GROUP]::METHOD, $historyMethod = "GROUP.METHOD"
 *
 * @method Virtua_View_Helper_HeadScript headScript() headScript() this returns the instance of the Head Script helper <br />
 *  - see {@link Virtua_View_Helper_HeadScript} <br />
 *  - Default {@link Virtua_View_Helper_HeadScript}::METHOD, $headScriptMethod = "METHOD"<br />
 *  - Others : [App|Virtua|Calleo|Shop|Cms]_View_Helper_Format_[GROUP]::METHOD, $headScriptMethod = "GROUP.METHOD"
 *
 * @method Virtua_View_Helper_HeadLink headLink() headLink() this returns the instance of the Head Link helper <br />
 *  - see {@link Virtua_View_Helper_HeadLink} <br />
 *  - Default {@link Virtua_View_Helper_HeadLink}::METHOD, $headLinkMethod = "METHOD"<br />
 *  - Others : [App|Virtua|Calleo|Shop|Cms]_View_Helper_Format_[GROUP]::METHOD, $headLinkMethod = "GROUP.METHOD"
 *
 * @method string url() url($urlOptions = array(), $routeName = null, $reset = true, $paramsOnly = true, $encode = true, $absolute = false) this returns the url <br />
 *  - see {@link Virtua_View_Helper_Url} <br />
 *  - Default {@link Virtua_View_Helper_Url}::METHOD, $urlMethod = "METHOD"<br />
 *  - Others : [App|Virtua|Calleo|Shop|Cms]_View_Helper_Format_[GROUP]::METHOD, $urlMethod = "GROUP.METHOD"
 *
 * @method string partial() partial($name = null, $module = null, $model = null) render partial <br />
 *  - see {@link Zend_View_Helper_Partial}
 *
 * @method string escape() escape($value)
 */
interface Zend_View_Interface
{
    /**
     * Return the template engine object, if any
     *
     * If using a third-party template engine, such as Smarty, patTemplate,
     * phplib, etc, return the template engine object. Useful for calling
     * methods on these objects, such as for setting filters, modifiers, etc.
     *
     * @return mixed
     */
    public function getEngine();

    /**
     * Set the path to find the view script used by render()
     *
     * @param string|array The directory (-ies) to set as the path. Note that
     * the concrete view implentation may not necessarily support multiple
     * directories.
     * @return void
     */
    public function setScriptPath($path);

    /**
     * Retrieve all view script paths
     *
     * @return array
     */
    public function getScriptPaths();

    /**
     * Set a base path to all view resources
     *
     * @param  string $path
     * @param  string $classPrefix
     * @return void
     */
    public function setBasePath($path, $classPrefix = 'Zend_View');

    /**
     * Add an additional path to view resources
     *
     * @param  string $path
     * @param  string $classPrefix
     * @return void
     */
    public function addBasePath($path, $classPrefix = 'Zend_View');

    /**
     * Assign a variable to the view
     *
     * @param string $key The variable name.
     * @param mixed $val The variable value.
     * @return void
     */
    public function __set($key, $val);

    /**
     * Allows testing with empty() and isset() to work
     *
     * @param string $key
     * @return boolean
     */
    public function __isset($key);

    /**
     * Allows unset() on object properties to work
     *
     * @param string $key
     * @return void
     */
    public function __unset($key);

    /**
     * Assign variables to the view script via differing strategies.
     *
     * Suggested implementation is to allow setting a specific key to the
     * specified value, OR passing an array of key => value pairs to set en
     * masse.
     *
     * @see __set()
     * @param string|array $spec The assignment strategy to use (key or array of key
     * => value pairs)
     * @param mixed $value (Optional) If assigning a named variable, use this
     * as the value.
     * @return void
     */
    public function assign($spec, $value = null);

    /**
     * Clear all assigned variables
     *
     * Clears all variables assigned to Zend_View either via {@link assign()} or
     * property overloading ({@link __get()}/{@link __set()}).
     *
     * @return void
     */
    public function clearVars();

    /**
     * Processes a view script and returns the output.
     *
     * @param string $name The script name to process.
     * @return string The script output.
     */
    public function render($name);
}
