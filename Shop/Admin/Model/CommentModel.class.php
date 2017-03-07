<?php
namespace Admin\Model;
use Think\Model;

class CommentModel extends Model{

	//admin首页feedback统计数
  public function comment_number(){

      $condition = array(
        'status' => 0,
        'parent_id' => 0,
      );
      $number = $this->where($condition)->count();

      return $number; 
   }
   
}