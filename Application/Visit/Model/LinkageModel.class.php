<?php

/*
* 测试模型tp_linkage表(四级联动)
**/

namespace Visit\Model;
use Think\Model;

class LinkageModel extends Model{
	
	public function searchParent($parent_id='0'){
		$condition = array();
		$condition['parent_id'] = array('EQ',$parent_id);		
		$query = $this->where($condition)->select();
		return $query;
	}

	public function htmlBack($parent_id = '0'){
		$html='<option value="">---请选择---</option>';
		if($parent_id){
			$List = $this->searchParent($parent_id);		
			foreach($List as $key => $val){				
				$html .= '<option value="'.$val['id'].'">';
				$html .= $val['name'];
				$html .= '</option>';
			}  
		}
		return $html;
	}
	
}