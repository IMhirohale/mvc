<?php

class Model_User extends Model{


	public function __construct(){
		$this->_db    = null;
		$this->_dbName = 'helloworld';
		$this->_table = 'hello_user';
		
	}
	
	public function userRegister($arrInput){
		if(empty($arrInput['userName'] || !Helper::checkName($arrInput['userName']))){

			Msg::js("用户名不合法或为空");
		}

		if(empty($arrInput['userPhone']) || !Helper::checkPhone($arrInput['userPhone'])){

			Msg::js("手机号不能为空或格式不正确");

		}

		if(empty($arrInput['userPasswd'])){

			Msg::js("密码不能为空");

		}

		if(empty($arrInput['userPasswdConfirm'])){

			Msg::js("确认密码不能为空");
		}

		if($arrInput['userPasswd'] !== $arrInput['userPasswdConfirm']){

			Msg::js("密码与确认密码不相等，请检查并重新输入");
		}

		$saltNumber = Helper::saltNumber();
		$arrInput['userPasswd'] = Helper::saltPasswd($arrInput['userPasswd'], $saltNumber);
		$userName   = $arrInput['userName'];
		$userPhone  = $arrInput['userPhone'];
		$userPasswd = $arrInput['userPasswd'];
		$createTime = $arrInput['createTime'];


		$sql = "insert into $this->_table(name,phone,salt,password,create_time)values('$userName','$userPhone',    '$saltNumber','$userPasswd','$createTime');";		

		try {

			$res = $this->insert($sql);
			if($res !== 0){
				Msg::js("注册成功！赶快去登录吧！","http://test.mvc.com/index/login/");
			}

		}catch (PDOException $e){
			
			Log::addWarning('Caught exception: '.$e->getMessage(). "\n");	
			Msg::js("注册失败！","http://test.mvc.com/index/index/");
		}
		
		if($res !== false){
			
			return $res;
		}

	}	

	public function userLogin($arrInput){

		if(empty($arrInput['userPhone']) || empty($arrInput['userPasswd'])){

			Msg::js("手机号和密码不能为空");

		}

		if(!Helper::checkPhone($arrInput['userPhone'])){

			Msg::js("请输入正确的手机号");

		}
		$userPhone = $arrInput['userPhone'];
		$sql       = "select phone,salt,password from $this->_table where phone=$userPhone;";

		try {

			$result = $this->query($sql);
			$userPasswd = Helper::saltPasswd($arrInput['userPasswd'] ,$result['salt']);
			if($userPasswd === $result['password']){

				//  $ssmObj = new MysqlSession();
				//  $ssmObj->sessionStart();

				$ssrObj = new RedisSession();
				$ssrObj->sessionStart();
				//记录用户登录状态
				$_SESSION['userInfo'] = [
					'userPhone'   => $arrInput['userPhone'],
					'userPasswd'   => $userPasswd,
					'isLogin' => 1,
				];

				Msg::js("登录成功！", "http://test.mvc.com/index/success/");

			}

		}catch (PDOException $e){

			Log::addWarning('Caught exception: '.$e->getMessage(). "\n");	
			Msg::js("登录失败！", "http://test.mvc.com/index/index/");
		}
		

	}

}
