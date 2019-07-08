<?php
/**
 * Autoloader declaration an methods section
 */
function uncamelize($camel,$splitter="/") {    $camel=preg_replace('/(?!^)[[:upper:]][[:lower:]]/', '$0', 
						preg_replace('/(?!^)[[:upper:]]+/', 
						$splitter.'$0', $camel));
    return $camel.$splitter;}

function autoloadModel($className) {    $path = uncamelize($className);
    $filename = $path . "Model.php";    
    if (is_readable($filename)) {        require $filename;    }}
function autoloadController($className) {    $path = uncamelize($className);
    $filename = $path . "Controller.php";
    if (is_readable($filename)) {        require $filename;    }}function autoloadView($className) {    $path = uncamelize($className);
    $filename = $path . "View.php";    
    if (is_readable($filename)) {        require $filename;    }}
spl_autoload_register("autoloadModel");spl_autoload_register("autoloadController");
spl_autoload_register("autoloadView");
    
/**
 * Bistro declaration
 */
$bistroController     = new AppBistroController();
$bistroAjaxController = new AppBistroControllerAjax();
	
/**
 * Smarty declaration
 */    
require_once('Vendors/smarty-3.1.33/libs/SmartyBC.class.php');
$smarty = new SmartyBC();
$smarty->setTemplateDir('Reference/templates');
$smarty->setCompileDir('Reference/templates_c');
$smarty->setCacheDir('Reference/cache');
$smarty->setConfigDir('Reference/configs');
//$smarty->debugging=true;
