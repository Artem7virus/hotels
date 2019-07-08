<?php

class AppBistroController extends CoreController{
	public $bistroList;
	public $bistroWinMenu;
	
	protected $bistroModel;
	protected $bistroView;
	
	public function AppBistroController(){
        $this->bistroView  = new AppBistroView();
        $this->bistroModel = new AppBistroModel();
	}
	
    public function defaultAction(){
        $this->bistroView->data        = $this->bistroModel->_getAllBistroes();
        $this->bistroView->bistroTypes = $this->bistroModel->_getBistroTypes();
        $this->bistroWinMenu           = $this->bistroView->getWinMenu();
        $this->bistroList              = $this->bistroView->getList();
    }
}
