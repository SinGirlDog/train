<?php

/*
* 测试模型-消息发布表-tp_message
**/

namespace Visit\Model;
use Think\Model;

class MessageModel extends Model{
	
	public function MessageByClick(){
		$condition = array();

		$order = array();
		$order['click'] = 'DESC';

		$msdata = $this->where($condition)->order($order)->select();

		return $msdata;
	}

	public function MessageJoinComment(){
		$condition = array();				 

		$MsCmData = $this->where($condition)->join('RIGHT JOIN __COMMENT__ ON __COMMENT__.ms_id = __MESSAGE__.id ')->group('ms_id')->select();

		return $MsCmData;
		
	}
}