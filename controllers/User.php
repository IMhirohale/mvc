<?php

class Controller_User{

	private $_objUser;

	public function __construct(){
		$this->_objUser = new Model_User();
	}

	public function register(){

		if('POST' == $_SERVER['REQUEST_METHOD']){

			$userInfo = [
				'userName'          => $_POST['name'],
				'userPhone'         => $_POST['phone'],
				'userPasswd'        => $_POST['passwd'],
				'userPasswdConfirm' => $_POST['passwdconfirm'],
				'createTime'        => time(),
			];


			$result = $this->_objUser->userRegister($userInfo);

			return $result;
		}

	}


	public function login(){

		if('POST' == $_SERVER['REQUEST_METHOD']){

			$userInfo = [
				'userPhone'  => $_POST['phone'],
				'userPasswd' => $_POST['passwd'],
			];

			$this->_objUser->userLogin($userInfo);
		}


	}
}
