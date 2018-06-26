<?php

class Dispatcher{
	
	private $path;

	public function __construct(){
		
		$this->path =  $_SERVER['REQUEST_URI'];
	
	}

	public function run(){
	
		$this->path = trim($this->path, '/'); //去除空格
		$paths = explode('/', $this->path); //以'/'划分数组
		
		//获取控制器类名和方法名
		$control = ucfirst(array_shift($paths));
		$method  = array_shift($paths);


		//如果控制器类名和方法名为空，则默认index
		if($control == ''){
			$control = 'Index';
		}

		if($method == ''){
			$method = 'index';
		}

		//根据框架的文件结构，得到控制器类的文件路径
		$controlFileName = ROOT_PATH.'/controllers/'.$control.'.php';
	
		if(file_exists($controlFileName)){
	
			include_once($controlFileName);
			
			$controllerName = 'Controller_'.$control;

			if(class_exists($controllerName)){

				$controlObj = new $controllerName();

				if(method_exists($controlObj, $method)){

					$controlObj->$method();

					return true;

				}	
				throw new Exception('方法名称不存在');
			}
			throw new Exception('类不存在');	
		}
		throw new Exception('控制器不存在');
	}

}

