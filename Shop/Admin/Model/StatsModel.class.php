<?php
namespace Admin\Model;
use Think\Model;

class StatsModel extends Model{

	 //admin首页asscess统计数组
   public function today_visit(){

        $today  = local_getdate();      
        $limit_time = mktime(0, 0, 0, $today['mon'], $today['mday'], $today['year']) - date('Z');
       
        $condition = array(
            'access_time' => array('GT',$limit_time),
        );

        $visit = $this->fetchSql(false)->where($condition)->count();

        return $visit;   
   }
   
}