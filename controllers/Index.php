<?php

class Controller_Index{

	public function index(){
		
		$content = file_get_contents('/home/homework/app/mvc/views/index.html');
		echo $content;exit;

	}

	public function register(){
		$content = file_get_contents('/home/homework/app/mvc/views/register.html');
		echo $content;exit;

	}

	public function login(){
		$content = file_get_contents('/home/homework/app/mvc/views/login.html');
		echo $content;exit;

	}

	public function success(){
		
		$content = file_get_contents('/home/homework/app/mvc/views/success.html');
		echo $content;exit;
	}

}
