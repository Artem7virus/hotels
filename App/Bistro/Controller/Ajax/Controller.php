<?php
	/**
	 * May by one to all? And one controlller? 
	 * May by one dicts? And one model..
	 * 
	 **/
class AppBistroControllerAjax extends AppBistroController{
	public $output;
	
	public function AppBistroControllerAjax(){
        $this->bistroModel =  new AppBistroModel();
	}
	
	public function showAddAction(){
        global $smarty;

		$smarty->assign('action_type', 'Добавление пункта питания');
        $smarty->assign('bistroTypeAJAXlist', $this->bistroModel->_getBistroTypes());
        $this->output = $smarty->fetch("bistro/add.tpl");

        die($this->output);
	}
	

	public function addAction(){
        global $smarty;

		$data['type']     = $_REQUEST['type'];
		$data['name']     = $_REQUEST['name'];
		$data['address']  = $_REQUEST['address'];
		$data['services'] = $_REQUEST['services'];
		$data['price']    = $_REQUEST['price'];
		$data['phone']    = $_REQUEST['phone'];

		$this->bistroModel->addBistro($data);
		
		$this->output = $smarty->fetch("bistro/add.tpl");
	}

	public function showEditAction($id){
        global $smarty;

		$smarty->assign('action_type', 'Редактирование пункта питания');
        $smarty->assign('bistroTypeAJAXlist', $this->bistroModel->_getBistroTypes());
        $smarty->assign('bistroAJAX', $this->bistroModel->_getById($id));
        
        $this->output = $smarty->fetch("bistro/edit.tpl");

        die($this->output);
	}
	
    public function editAction($id){
	
	}
		
	public function delAction($id){
        global $smarty;

		$this->bistroModel->delBistro($id);
        //$this->output = $smarty->fetch("bistro/edit.tpl");

        //die($this->output);
	}
	
	public function refreshList(){
		$this->bistroView->data = $this->bistroModel->_getAllBistroes();
        $this->bistroList       = $this->bistroView->getList();

		//die($this->bistroList);
	}
}
