<?php

class Controller_Index{

	private $obj;
	private $smarty;

	public function __construct(){
		$this->obj = new Model_Index();
	}
	
	public function index(){
		
		echo "欢迎来到首页";	
		$userInfo = $this->obj->getInfo();		
		$this->smarty = new Smarty();
		$this->smarty->assign('user', $userInfo);
		$this->smarty->display(ROOT_PATH.'/views/index.tpl');

	}

}
