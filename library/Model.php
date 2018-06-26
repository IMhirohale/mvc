<?php

class Model{

	/**
	 *
	 * 待连接数据库配置名称
	 * @var string
	 * */
	protected $_dbName;

	/**
	 * 待连接的数据表名
	 * @var string
	 * */
	protected $_table;

	/**
	 * 数据库连接对象
	 * @var resource
	 * */
	protected $_db;

	/**
	 * 是否每次都获取新的连接
	 * @var bool
	 * */
	protected $_new = FALSE;

	/**
	 * mysql日志文件
	 * @var string
	 * */
	protected $_logFile = NULL;


	/**
	 * Dao基类的构造函数，子类需要写自己的构造函数覆盖父类构造函数
	 *
	 * */
	public function __construct(){}

	/**
	 * 使用输入的SQL语句进行查询
	 * @api
	 * @param string $sql句
	 * array 查询结果集，失败为false
	 * */
	public function query($sql){
		if(empty($this->_db)){	
			$this->_db = Db::getInstance()->getPDO();
		}
		$pre = $this->_db->prepare($sql);		
		$pre->execute();
		$res = $pre->fetch(PDO::FETCH_ASSOC);
		
		return $res;
	}
	
}
