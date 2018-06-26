<?php

/**
 * 自动加载类autoload
 * */

class Autoloader{
	
	public static $loader;

	public function __construct(){
	
		//将$this->import()注册到sql_autoload，作为本项目中类的自动加载方法
		spl_autoload_register(array($this,'import'));
	}	
	
	/**
	 * Autoloader的入口函数
	 * 用于创建Autoloader的唯一实例化对象
	 * */
	public static function init(){
		
		if(self::$loader == NULL){
			self::$loader = new self();
		}
		return self::$loader; 
	}

	/**
	 * 类的自动加载方法 
	 * 根据传入参数$className，自动引入相应类的源文件
	 * */
	public function import($className){
		$paths = explode('_', $className);
		$dirPath = lcfirst(array_shift($paths)).'s';
		$fileName = array_shift($paths);

		$filePath = ROOT_PATH .'/'.$dirPath.'/'.$fileName.'.php';
	   
		if (is_file($filePath)) {
            require $filePath;
        }
	}
}

