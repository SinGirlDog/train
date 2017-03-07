<?php
namespace Admin\Model;
use Think\Model;

class FeedbackModel extends Model{

	 //admin首页feedback统计数
   public function feedback_number(){

    $number = $this->count();
    return $number;

   /**未知的sql**  
   $sql = "SELECT COUNT(f.msg_id) ".
    "FROM " . $ecs->table('feedback') . " AS f ".
    "LEFT JOIN " . $ecs->table('feedback') . " AS r ON r.parent_id=f.msg_id " .
    'WHERE f.parent_id=0 AND ISNULL(r.msg_id) ' ;
*/

   }
   
}