<?php
namespace Home\Model;
use Think\Model;

/**
* 
*/
class PaymentModel extends Model{

	/**
	 * 取得已安装的支付方式(其中不包括线下支付的)
	 * @param   bool    $include_balance    是否包含余额支付（冲值时不应包括）
	 * @return  array   已安装的配送方式列表
	 */
	public function get_online_payment_list($include_balance = true){
	   
	    $modules = array();

	    $fields = array('pay_id', 'pay_code', 'pay_name', 'pay_fee', 'pay_desc');
	    $condition = array(
	    	'enabled' => 1,
	    	 'is_cod' => array('NEQ',1),
	    );
	    if (!$include_balance){
	    	$condition['pay_code'] = array('NEQ','balance');
	    }
	    $modules = $this->field($fields)->where($condition)->select();

	    // include_once(ROOT_PATH.'includes/lib_compositor.php');

	    return $modules;
	}

}	
