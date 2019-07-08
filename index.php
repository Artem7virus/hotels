<?php 
    header('Content-Type: text/html; charset=utf-8');
    
    require_once('config.php');
    require_once('router.php');
   
	$smarty->assign('bistro_winMenu', $bistroController->bistroWinMenu);
    $smarty->assign('bistro_list', $bistroController->bistroList);
    $smarty->display('main.tpl');
