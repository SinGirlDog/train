<?php
namespace Home\Controller;
use Think\Controller;

class UserController extends IndexController{
	
	function _initialize() {
		parent::_initialize();
		
		$this->_mergeConfig();

        $this->data_prepare();	

		// echo '<pre/>'; print_r(I('param.'));die;

		$this->action = I('param.act') ? I('param.act') : 'default';

	}

	public function index(){


		// $this->display('lbi:user_clips');

		$this->display('lbi:user_passport');
	}

	protected function data_prepare(){

		$this->action = 'login';

		$this->navigator_list_prepare();

		$this->bread_crumb(0,C('_LANG.user_center'));

		$this->footer_assign();

		$Users = D('Users');
		$info = $Users->get_user_default();
		$this->assign('info',$info);

		$GoodsActivity = D('GoodsActivity');
		$prompt = $GoodsActivity->get_user_prompt();
		$this->assign('prompt',$prompt);

		$Feedback = D('Feedback');
		$message_list = $Feedback->get_message_list();
		$this->assign('message_list',$message_list);

		$OrderInfo = D('OrderInfo');
		$order_info = $OrderInfo->get_orderinfo_by_id();
		$this->assign('order_info',$order_info);

		$act = array('act' => $this->action);
		$record_count = $Feedback->get_record_count();
		$page = I('param.page',1);
		$pager = get_pager(U('User'), $act, $record_count, $page, 5);
		$this->assign('pager',$pager);

		$Tag = D('Tag');
		$tags = $Tag->get_user_tags();
		$this->assign('tags',$tags);

		$Reg = D('RegFields');
		$extend_info_list = $Reg->get_extend_info();
		$this->assign('extend_info_list',$extend_info_list);

		// echo '<pre/>'; print_r(C(''));die;
	}

	protected function _mergeConfig() {
		parent::_mergeConfig();

		$_USER_LANG = include ('./Shop/Home/Conf/lang_user_config.php');
		$_PRE_LANG = C('_LANG');

		$_MERGE_LANG = array_merge($_USER_LANG,$_PRE_LANG);
		
		// echo '<pre/>';			die;		

		C('_LANG',$_MERGE_LANG);
		$this->assign('lang',$_MERGE_LANG);
	}
}
