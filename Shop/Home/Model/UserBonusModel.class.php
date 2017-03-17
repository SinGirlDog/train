<?php
namespace Home\Model;
use Think\Model;

/**
* 
*/
class UserBonusModel extends Model
{
	public function get_count(){
		$user_id = $user_id	? $user_id : session('user_id');

		$condition = array('user_id'=>$user_id);
		$record_count = $this->count();
		
		return $record_count;
	}


	/**
	 *
	 * @param   int         $user_id         用户ID
	 * @param   int         $num             列表显示条数
	 * @param   int         $start           显示起始位置
	 *
	 * @return  array       $arr             红保列表
	 */
	public function get_user_bouns_list($user_id, $num = 10, $start = 0)
	{
		$user_id = $user_id	? $user_id : session('user_id');
		
		$fields = array(
			'u.bonus_sn',
			'u.order_id', 
			'b.type_name', 
			'b.type_money', 
			'b.min_goods_amount',
			'b.use_start_date', 
			'b.use_end_date'
		);

		$condition=array('u.user_id'=>$user_id);

		$res = $this->alias('u')->
		join('__BONUS_TYPE__ b on u.bonus_type_id = b.type_id')->
		field($fields)->where($condition)->limit($num)->select();
	    
	    $arr = array();

	    $day = getdate();
	    $cur_date = local_mktime(23, 59, 59, $day['mon'], $day['mday'], $day['year']);
	  
	    foreach($res as $row)
	    {
	        /* 先判断是否被使用，然后判断是否开始或过期 */
	        if (empty($row['order_id']))
	        {
	            /* 没有被使用 */
	            if ($row['use_start_date'] > $cur_date)
	            {
	                $row['status'] = C('_LANG.not_start');
	            }
	            else if ($row['use_end_date'] < $cur_date)
	            {
	                $row['status'] = C('_LANG.overdue');
	            }
	            else
	            {
	                $row['status'] = C('_LANG.not_use');
	            }
	        }
	        else
	        {
	        	$url = U('User/index',
	        		array('act'=>'order_detail','order_id'=>$row['order_id']));
	            $row['status'] = '<a href="'.$url.'" >' .C('_LANG.had_use'). '</a>';
	        }

	        $row['use_startdate']  = local_date(C('_CFG.date_format'), $row['use_start_date']);
	        $row['use_enddate']    = local_date(C('_CFG.date_format'), $row['use_end_date']);

	        $arr[] = $row;
	    }
	    return $arr;

	}
}
