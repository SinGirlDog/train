<?php
/*
 * 从网址获取网站内容
 **/
namespace Visit\Controller;
use Think\Controller;
class GotcontentController extends Controller {
	public function index(){
		$re_num = rand(0,2);
		if($re_num){
			$readcontents = fopen("http://localhost/", "rb");
		   	$contents = stream_get_contents($readcontents);
		   	
		   	if($re_num==2){
		   		// fclose($readcontents);	
		   		// $readcontents = fopen("http://localhost/", "rb"); 
		   		$contents = stream_get_contents($readcontents);
		   		// fclose($readcontents);	 
		   	}

		  	fclose($readcontents);	   
	   		echo $contents.$re_num;
		}
		else{
			echo file_get_contents("http://www.baidu.com/"); 
		}
		
		$this->display(':Gotcontent:index');
	}
	
}