<?php
namespace Home\Model;
use Think\Model;

class AccountLogModel extends Model{

	public function get_count(){
		
		$user_id = $user_id	? $user_id : session('user_id');

		$condition = array(
			'user_id'=>$user_id,
			'user_money' => array('NEQ',0),
		);
		$record_count = $this->where($condition)->count();

		return $record_count;
	}

	public function get_log($user_id, $num, $start){
		
		$user_id = $user_id	? $user_id : session('user_id');
		$account_log = array();

		$condition = array(
			'user_id'=>$user_id,
			'user_money' => array('NEQ',0),
		);

		$res = $this->where($condition)->order('log_id DESC')->limit($num)->select();
	   
	   	foreach($res as $row)
	    // while ($row = $db->fetchRow($res))
	    {
	        $row['change_time'] = local_date(C('_CFG.date_format'), $row['change_time']);
	        $row['type'] = $row[$account_type] > 0 ? C('_LANG.account_inc') : C('_LANG.account_dec');
	        $row['user_money'] = price_format(abs($row['user_money']), false);
	        $row['frozen_money'] = price_format(abs($row['frozen_money']), false);
	        $row['rank_points'] = abs($row['rank_points']);
	        $row['pay_points'] = abs($row['pay_points']);
	        $row['short_change_desc'] = sub_str($row['change_desc'], 60);
	        $row['amount'] = $row[$account_type];
	        
	        $account_log[] = $row;
	    }

	    return $account_log;
	}
}
