<?php

/*
* 测试模型tp_province表
**/

namespace Visit\Model;
use Think\Model;

class ProvinceModel extends Model{
	
	public function searchProvince(){
		$condition = array();
		
		$query = $this->where($condition)->select();

		return $query;
	}
	
}