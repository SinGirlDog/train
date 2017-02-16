<?php
/*
 * 字符串大小写转换的尝试
 **/
namespace Visit\Controller;
use Think\Controller;
class LowController extends Controller {
	public function index(){
		
		$this->display(':Low:index');
	}

	public function change(){
		$letter = I('post.letter');
		$way = I('post.way');

		if(empty($letter)){
			$letter = 'nothing input';
		}
		switch($way){
			case 'low':
			$letter = strtolower($letter);
			break;
			case 'up':
			$letter = strtoupper($letter);
			break;
			default:
			$letter = 'error change way';
			break;
		}

		$this->ajaxReturn($letter,'',1);
	}
}