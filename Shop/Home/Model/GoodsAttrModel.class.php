<?php
namespace Home\Model;
use Think\Model;

/**
* 
*/
class GoodsAttrModel extends Model
{
	
	public function get_value_list($goods_attr=array()){
		$attr_list = array();
		
		$fields = array('attr_value');
		$condition = array(
			'goods_attr_id' => array('IN',$goods_attr)
		);
		$attr_list = $this->fetchSql(true)->field($fields)->where($conditoin)->getField();
		return $attr_list;
		// $sql = "SELECT attr_value FROM " . $GLOBALS['ecs']->table('goods_attr') . " WHERE goods_attr_id " .
  //               db_create_in($row['goods_attr']);
  //               $attr_list = $GLOBALS['db']->getCol($sql);
	}
}
