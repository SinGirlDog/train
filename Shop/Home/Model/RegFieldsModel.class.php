<?php
namespace Home\Model;
use Think\Model;
/*
* 会员注册页面需要显示的填写内容
*
**/
class RegFieldsModel extends Model{

	public function get_extend_info(){
		$list = array();

		$condition = array(
			'type' => array('LT',2),
			'display' => 1,
			// 'id' => array('NEQ',6),
		);
		$order = array('dis_order','id');
		$list = $this->where($condition)->order($order)->select();

		return $list;
	}
}