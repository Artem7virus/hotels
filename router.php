<?php
if(isset($_REQUEST['action'])){
    switch($_REQUEST['action']){
        case 'showAddBistroForm':
            $bistroAjaxController->showAddAction();
        break;
        case 'addBistro':
            $bistroAjaxController->addAction();
        break;
        case 'showEditBistroForm':
			if(isset($_REQUEST['id'])){
				$bistroAjaxController->showEditAction($_REQUEST['id']);
			} else {
				$bistroAjaxController->showAddAction();
			}
        break;
        case 'delBistro':
			if(isset($_REQUEST['id'])){
				$bistroAjaxController->delAction($_REQUEST['id']);
			}
        break;
        default:
            $bistroController->defaultAction();
    }
}
else{
    $bistroController->defaultAction();
}
