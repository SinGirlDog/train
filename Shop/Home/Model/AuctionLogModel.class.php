<?php
namespace Home\Model;
use Think\Model;

class AuctionLogModel extends Model{

	public function get_last_auc_count($act_id){
		
		$count = $this->fetchSql(false)->where('act_id = '.$act_id)->count('DISTINCT bid_user');

		return $count;
	}

	public function get_last_auc_user($act_id){

		$res = array();
		$fields = array('a.*','u.user_name');
		$condition = array('act_id' => $act_id);
		$res = $this->alias('a')->join('__USERS__ u on u.user_id = a.bid_user')->
		field($fields)->where($condition)->order('a.log_id DESC')->find();
		return $res;
	}
}
