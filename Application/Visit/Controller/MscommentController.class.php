<?php
/*
 *	联表查询
 **/
namespace Visit\Controller;
use Think\Controller;
class MscommentController extends Controller {
    public function index(){
    	
    	$rad = rand(0,1);
    	if($rad == 1){
    		$message = D('Relation\Message');
    		$msdata = $message->MessageReComment();
    	}
    	else{
    		$message = D('Message');    		
    		$msdata = $message->MessageJoinComment();    		
    	}
    	
    	$this->assign('msdata',$msdata);
		$this->display(':Mscomment:index');
    	
    }
}