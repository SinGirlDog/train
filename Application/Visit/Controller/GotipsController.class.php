<?php
/*
 * 获取并打印服务器IP地址、本机IP地址
 **/
namespace Visit\Controller;
use Think\Controller;
class GotipsController extends Controller {
	public function index(){

		echo getenv('SERVER_ADDR');
		echo getenv('REMOTE_ADDR');
		echo '<pre/>';
		print_r($_SERVER);
		echo gethostbyname("www.baidu.com");
		echo gethostbyname("localhost");
		
		$this->display(':Gotips:index');
	}
	
}