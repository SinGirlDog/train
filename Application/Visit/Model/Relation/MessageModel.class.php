<?php

/*
* 测试关联模型-消息发布表-tp_message
**/

namespace Visit\Model\Relation;
use Think\Model\RelationModel;

class MessageModel extends RelationModel{

	protected $_link = array(
		'Comment' => array(
			'mapping_type' => self::HAS_MANY,
			'class_name' => 'Comment',
			'foreign_key' => 'ms_id',
			'mapping_name' => 'comment',
			'mapping_fields' => array('count(ms_id)' => 'count'),
			),
		);
	
	public function MessageReComment(){
		$condition = array();

		$order = array();
		$order['click'] = 'DESC';

		$msdata = $this->relation(true)->where($condition)->order($order)->select();

		return $msdata;
	}

}