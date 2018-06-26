<?php

/**
 * 入口文件
 * */

define('ROOT_PATH', str_replace('\\', '/', dirname(__FILE__))); //当前框架目录

//加载基本分发器
require_once ROOT_PATH.'/library/Dispatcher.php';

//加载日志类
require_once ROOT_PATH.'/library/Log.php';

//加载model模块基类
require_once ROOT_PATH.'/library/Model.php';

//加载Redis相关类
require_once ROOT_PATH.'/library/Redis.php';
require_once ROOT_PATH.'/library/RedisInit.php';
require_once ROOT_PATH.'/library/RedisSession.php';

//加载基本消息提示类
require_once ROOT_PATH.'/library/Message.php';

//加载mysql存储session类
require_once ROOT_PATH.'/library/MysqlSession.php';

//加载Db类
require_once ROOT_PATH.'/library/Db.php';

//加载smarty模版引擎类
require_once ROOT_PATH.'/library/smarty/Smarty.class.php';

//引入自动加载类并初始化
require_once ROOT_PATH.'/library/Autoloader.php';
Autoloader::init();


try {

	$obj = new Dispatcher();//实例化请求分发器 
	$res = $obj->run();

} catch (Exception $e){

	Log::addWarning('Caught exception: '.$e->getMessage(). "\n");
	header("HTTP/1.0 404 Not Found");
}
