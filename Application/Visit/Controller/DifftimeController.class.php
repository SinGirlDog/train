<?php
/*
 *计算两个日期之间的工作日差(仅排除周六周日)理论值
 **/
namespace Visit\Controller;
use Think\Controller;
class DifftimeController extends Controller {
    public function index(){    	

		$this->display(':Difftime:index');  
    	
    }

    public function countDiff(){
    	$start_time = I('post.st');
    	$end_time = I('post.et');
    	
    	if(empty($start_time)){
    		$stime = time();
    	}
    	else{
    		$stime = strtotime($start_time);
    	}
    	if(empty($end_time)){
    		$etime = time();    		
    	}
    	else{
    		$etime = strtotime($end_time);
    	}    	

    	$diff = $etime-$stime;
    	$diff /= 86400;
    	$weeks = floor($diff/7);

    	$start_week = date('w',$stime);    	
    	$end_week = date('w',$etime);
    	if($start_week >= 5){
    		$start_week = 5;
    	}
    	if($end_week >= 5){
    		$end_week = 5;
    	}
    	$end_week = $start_week > $end_week?$end_week + 5:$end_week;

    	$data = array();
    	$data['st'] = date('Y-m-d',$stime);
    	$data['et'] = date('Y-m-d',$etime);
    	$data['count'] = $weeks*5 + $end_week-$start_week;

    	$this->ajaxReturn($data,'',1);
    	
    }
}