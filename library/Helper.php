<?php

class Helper{	

	/*
	 * 校验用户手机号
	 * **/
	public static function checkPhone($str){

		if(11 != strlen($str)) return false;
		return preg_match("/13[0-9]{9}|15[0-9]{9}|18[0-9]{9}|147[0-9]{8}|17[0-9]{9}|144[0-9]{8}/",$str);	

	}

	/*
	 * 检测用户姓名
	 * **/
	public static function checkName($str){

		return preg_match("/^[\s0-9a-zA-Z\x80-\xff]+$/", $str);

	}

	/*
	 * 用户密码加密
	 * **/
	public static  function saltPasswd($passwd, $salt){

		return md5(md5($passwd) . ', ' . $salt);	

	}

	/*
	 * 盐密机制
	 * **/
	public static  function saltNumber(){

		return rand(100000, 999999);

	}

}

