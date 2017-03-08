<?php
namespace Home\Model;
use Think\Model;

class FeedbackModel	extends Model{


	/**
	 *  获取指定用户的留言
	 *
	 * @param   int     $user_id        用户ID
	 * @param   int     $user_name      用户名
	 * @param   int     $num            列表最大数量
	 * @param   int     $start          列表其实位置
	 * @return  array   $msg            留言及回复列表
	 * @return  string  $order_id       订单ID
	 */
	public function get_message_list($user_id, $user_name, $num, $start, $order_id = 0)
	{
	    /* 获取留言数据 */
	    $msg = array();	    

	    $order = array('msg_time DESC');
	   
	    $condition = $this->cond_by_is_orderid($user_id,$order_id);

	    $res = $this->fetchSql(false)->where($condition)->order($order)->limit($start,$num)->select();
	    // return $res;
	  
	    foreach ($res as $key=>$row)
	    {
	       
            $reply = array();	          
            $reply = $this->get_msg_replay($row['msg_id']);

            if ($reply)
            {
                $msg[$row['msg_id']]['re_user_name']   = $reply['user_name'];
                $msg[$row['msg_id']]['re_user_email']  = $reply['user_email'];
                $msg[$row['msg_id']]['re_msg_time']    = local_date(C('_CFG.time_format'), $reply['msg_time']);
                $msg[$row['msg_id']]['re_msg_content'] = nl2br(htmlspecialchars($reply['msg_content']));
            }
	     
	        $msg[$row['msg_id']]['msg_content'] = nl2br(htmlspecialchars($row['msg_content']));
	        $msg[$row['msg_id']]['msg_time']    = local_date(C('_CFG.time_format'), $row['msg_time']);
	        $msg[$row['msg_id']]['msg_type']    = $order_id ? $row['user_name'] : C('_LANG.type.'.$row['msg_type']);
	        $msg[$row['msg_id']]['msg_title']   = nl2br(htmlspecialchars($row['msg_title']));
	        $msg[$row['msg_id']]['message_img'] = $row['message_img'];
	        $msg[$row['msg_id']]['order_id'] = $row['order_id'];
	    }

	    return $msg;
	}

	 /* 取得留言的回复 */
	protected function get_msg_replay($msg_id){
		$rep = array();
		$fields = array('user_name','msg_time','msg_content');
		$condition = array('parent_id' => $msg_id);
		
		$rep = $this->field($fields)->where($condition)->find();
		return $rep;

	}

	public function get_record_count($user_id,$order_id){	    
	    $condition = $this->cond_by_is_orderid($user_id,$order_id);
		$count = $this->where($condition)->count();
		return $count;		    
	}

	protected function cond_by_is_orderid($user_id,$order_id){

		$condition = array(
	    	'parent_id' => 0,	    	
	    	'user_id' => $user_id,
	    );
	    if ($order_id){
	    	$condition['order_id'] = $order_id;
	    }
	    else{
	    	$condition['order_id'] = 0;
	    	$condition['user_name'] = session('user_name');
	    }
	    return $condition;
	}

}
