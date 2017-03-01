<?php
namespace Admin\Controller;
use Think\Controller;

class LoginController extends Controller{
	
	public function login(){
		$param = I('param.');
		
		$verify = new \Lib\VerifyCode();
		$check = $verify->check($param['captcha']);
			

		if($check){
			$logincheck = D('AdminUser')->login_check($param['username'],$param['password']);
			if($logincheck){
				$data = array(
					'statu' => 1,
	                'info' => 'ok',
	                'callback' => U('Admin/Index/index')
            	);
			}
			else{
				$data = array(
					'statu' => 0,
	                'info' => '登录信息有误',
	            );
			}
			
			// print_r($check);
		}
		else{
			$data = array(
				'statu' => 0,
                'info' => '验证码错误',                
            );
		}
		
		$this->ajaxReturn($data,'',1);
	}
}
