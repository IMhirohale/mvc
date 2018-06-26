<?php

class Model_Index extends Model{
 
	public function getInfo(){
		
		$sql = 'select * from hello_user;';
		
		$res = $this->query($sql);

		return $res;

	}	
}

