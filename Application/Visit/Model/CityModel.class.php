<?php

/*
* 测试模型tp_city表
**/

namespace Visit\Model;
use Think\Model;

class CityModel extends Model{
	
	public function searchCity($provinceID = '0'){
		$condition = array();
		$condition['province_id'] = array('EQ',$provinceID);
		$query = $this->where($condition)->select();
		return $query;
	}
	
	public function htmlCity($provinceID = '0'){		
		$html = '<option value="">选择城市</option>';
		if($provinceID){
			$cityList = $this->searchCity($provinceID);		
			foreach($cityList as $key => $cityOne){				
				$html .= '<option value="'.$cityOne['id'].'">';
				$html .= $cityOne['name'];
				$html .= '</option>';
			}   
		}
        return $html;
	}
}