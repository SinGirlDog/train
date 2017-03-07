<?php
namespace Home\Controller;
use Think\Controller;

class UserController extends IndexController{
	
	public function index(){
		// echo 'is it the file';
		$this->data_prepare();

		$this->display('lbi:user_clips');
	}

	protected function data_prepare(){

		$this->action = 'default';

		$Users = D('Users');
		$info = $Users->get_user_default();
		$this->assign('info',$info);

		$GoodsActivity = D('GoodsActivity');
		$prompt = $GoodsActivity->get_user_prompt();
		$this->assign('prompt',$prompt);
		// echo '<pre/>'; print_r($prompt);die;
	}
}
