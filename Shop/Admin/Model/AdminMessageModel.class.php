<?php
namespace Admin\Model;
use Think\Model;

class AdminMessageModel extends Model{

	public function get_msg(){	
		$admin_id = session('admin_data.user_id');	
		$fields = array('message_id', 'sender_id', 'receiver_id', 'sent_time', 'readed', 'deleted', 'title', 'message', 'user_name');

		$condition = array(
			'a.receiver_id' => $admin_id,
			'a.readed' => 0,
			'deleted' => 0,
		);
		
		$admin_msg = $this->alias('a')->join('__ADMIN_USER__ b on b.user_id = a.sender_id ')->
		where($conditoin)->field($fields)->order('a.sent_time DESC')->select();
		
		return $admin_msg;
	}
}
