<?php
namespace Home\Model;
use Think\Model;

/**
 * 
 */
 class UserAccountModel extends Model
 { 	
 	public function get_count($user_id=0){

 		$user_id = $user_id	? $user_id : session('user_id');

 		$surplus_save = C('SURPLUS_SAVE');
 		$surplus_return = C('SURPLUS_RETURN');

 		$condition = array(
 			'user_id' => $user_id,
 			'process_type' => array('IN',array($surplus_save,$surplus_return)),
 		);
 		$count = $this->where($condition)->count();
 		return $count;
 	}

 	/**
	 * 查询会员余额
	 * @param   int     $user_id        会员ID
	 * @return  int
	 */
	public function get_user_surplus($user_id)
	{
		$user_id = $user_id	? $user_id : session('user_id');
		
		$fields = array('SUM(user_money)'=>'sum_money');
		$condition = array('user_id'=>$user_id);

		$surplus = M('AccountLog')->
		fetchSql(false)->field($fields)->where($condition)->find();

	    // $sql = "SELECT SUM(user_money) FROM " .$GLOBALS['ecs']->table('account_log').
	           // " WHERE user_id = '$user_id'";

		if(empty($surplus)){
			$surplus['sum_money'] = 0;
		}
	    return $surplus['sum_money'];
	}

	

	/**
	 * 查询会员余额的操作记录
	 *
	 * @param   int     $user_id    会员ID
	 * @param   int     $num        每页显示数量
	 * @param   int     $start      开始显示的条数
	 * @return  array
	 */
	public function get_log($user_id, $num, $start)
	{
		$user_id = $user_id	? $user_id : session('user_id');
		$surplus_save = C('SURPLUS_SAVE');
 		$surplus_return = C('SURPLUS_RETURN');
 		$account_log = array();
	    
	    $condition = array(
 			'user_id' => $user_id,
 			'process_type' => array('IN',array($surplus_save,$surplus_return)),
 		);

	    $res = $this->fetchSql(true)->where($condition)->limit($num)->order('add_time DESC')->select();

	    if ($res)
	    {
	    	foreach($res as $rows)
	        // while ($rows = $GLOBALS['db']->fetchRow($res))
	        {
	            $rows['add_time']         = local_date(C('_CFG.date_format'), $rows['add_time']);
	            $rows['admin_note']       = nl2br(htmlspecialchars($rows['admin_note']));
	            $rows['short_admin_note'] = ($rows['admin_note'] > '') ? sub_str($rows['admin_note'], 30) : 'N/A';
	            $rows['user_note']        = nl2br(htmlspecialchars($rows['user_note']));
	            $rows['short_user_note']  = ($rows['user_note'] > '') ? sub_str($rows['user_note'], 30) : 'N/A';
	            $rows['pay_status']       = ($rows['is_paid'] == 0) ? C('_LANG.un_confirm') : C('_LANG.is_confirm');
	            $rows['amount']           = price_format(abs($rows['amount']), false);

	            /* 会员的操作类型： 冲值，提现 */
	            if ($rows['process_type'] == 0)
	            {
	                $rows['type'] = C('_LANG.surplus_type_0');
	            }
	            else
	            {
	                $rows['type'] = C('_LANG.surplus_type_1');
	            }

	            /* 支付方式的ID */	            
	            $pid = $this->payment_id($rows['payment']);

	            /* 如果是预付款而且还没有付款, 允许付款 */
	            if (($rows['is_paid'] == 0) && ($rows['process_type'] == 0))
	            {
	            	$url = U('User/index',array('act'=>'pay','id'=>$rows['id'],'pid'=>$pid));
	                $rows['handle'] = '<a href="'.$url.'">'.C('_LANG.pay').'</a>';
	            }
	            $account_log[] = $rows;
	        }

	        return $account_log;
	    }
	    else
	    {
	         return false;
	    }
	}

	protected function payment_id($payment){
		$condition = array(
			'pay_name' => $payment,
			'enabled' => 1
		);
		$data = M('Payment')->field('pay_id')->where($condition)->find();

		return $data;
	}
} 
