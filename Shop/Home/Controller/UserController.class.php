<?php
namespace Home\Controller;
use Think\Controller;

class UserController extends IndexController{
	
	function _initialize() {
		parent::_initialize();
		
		$this->_mergeConfig();

        $this->data_prepare();	

		// echo '<pre/>'; print_r(I('param.'));die;

		// $this->action = I('param.act') ? I('param.act') : 'default';

	}

	public function index(){

		switch($this->action){			
			case 'login':
				$tpl_name = 'user:user_passport';
			break;			
			case 'account_log':
				$this->account_log();
				$tpl_name = 'user:user_transaction';			
			break;
			case 'account_detail':
				$this->account_detail();
				$tpl_name = 'user:user_transaction';			
			break;
			case 'account_deposit':
				$this->account_deposit();
				$tpl_name = 'user:user_transaction';			
			break;
			case 'account_repay':
				$tpl_name = 'user:user_transaction';			
			break;	
			case 'bonus':
				$this->bonus();	
				$tpl_name = 'user:user_transaction';
			break;		
			default:
				$tpl_name = 'user:user_clips';
			break;
		}
		$this->display($tpl_name);
	}

	public function act_login(){
		$username = I('param.username');
		$password = I('param.password');
		$Users = D('Users');
		$res = $Users->check_login($username,$password);
		if($res){
			// update_user_info();
   			// recalculate_price();
			
			$show_param = array(
				'content' => C('_LANG.login_success'),
				'links' => array(
					C('_LANG.back_up_page'),
					C('_LANG.profile_lnk'),
				),
				'hrefs' => array(
					U('User/index'),
					U('User/index'),
				),
				'type' => 'info'
			);	
		}
		else{
			$show_param = array(
				'content' => C('_LANG.login_failure'),
				'links' => C('_LANG.relogin_lnk'),					
				'hrefs' => U('User/index'),				
				'type' => 'error'
			);	
		}
		$this->show_message($show_param);
	}

	public function logout(){
		$Users = D('Users');
		$Users->do_logout();
		// echo '<pre/>';print_r(session());die;
		$show_param= array(
			'content' => C('_LANG.logout'),
			'links' => array(
				C('_LANG.back_up_page'),
				C('_LANG.back_home_lnk'),
			),				
			'hrefs' => array(
				U('Index/index'),
				U('Index/index'),	
			),			
			'type' => 'info'
		);		
		$this->show_message($show_param);

	}

	protected function account_log(){
		$UserAccount = D('UserAccount');
		$record_count = $UserAccount->get_count();
		$page = I('param.page',1);
		$pager = get_pager(U('User'), array('act' => $this->$action), $record_count, $page);
		$this->assign('pager', $pager);

		$this->surplus_amount();

		$account_log = $UserAccount->get_log($user_id, $pager['size'], $pager['start']);
		$this->assign('account_log', $account_log);
		// echo '<pre/>'; print_r($account_log);die;
	}

	protected function account_detail(){
		$AccountLog = D('AccountLog');
		$record_count = $AccountLog->get_count();
		$page = I('param.page',1);
		$pager = get_pager(U('User'), array('act' => $this->$action), $record_count, $page);

		$this->surplus_amount();

		$account_log = $AccountLog->get_log($user_id, $pager['size'], $pager['start']);
		$this->assign('account_log', $account_log);
	}

	protected function surplus_amount(){
		$UA = D('UserAccount');
		$surplus_amount = $UA->get_user_surplus();
		$this->assign('surplus_amount', price_format($surplus_amount,false));
	}

	protected function account_deposit(){
		$Payment = D('Payment');
		$payment = $Payment->get_online_payment_list();
		$this->assign('payment', $payment);

		$UserAccount = D('UserAccount');
		$order = $UserAccount->get_surplus_info();
		$this->assign('order', $order);
	}

	protected function bonus(){
		$UserBonus = D('UserBonus');
		$record_count = $UserBonus->get_count();
		$page = I('param.page',1);
		$pager = get_pager(U('User'), array('act' => $this->$action), $record_count, $page);
		$this->assign('pager', $pager);

		$bonus = $UserBonus->get_user_bouns_list($user_id, $pager['size'], $pager['start']);
    	$this->assign('bonus', $bonus);
	}

	protected function data_prepare(){

		$this->action = I('param.act') ? I('param.act') : 'default';		

		$this->navigator_list_prepare();

		$this->assign_user_info();

		$this->bread_crumb(0,C('_LANG.user_center'));

		$this->footer_assign();

		$Users = D('Users');
		$info = $Users->get_user_default();
		$this->assign('info',$info);
		
		$UserRank = D('UserRank');
		$rank = $UserRank->get_rank_info();
		if(!empty($rank)){
			$this->assign('rank_name', sprintf(C('_LANG.your_level'), $rank['rank_name']));
			$this->assign('next_rank_name', sprintf(C('_LANG.next_level'), $rank['next_rank'] ,$rank['next_rank_name']));
		}		

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
	}

	protected function _mergeConfig() {
		parent::_mergeConfig();

		$_USER_LANG = include ('./Shop/Home/Conf/lang_user_config.php');
		$_PRE_LANG = C('_LANG');

		$_MERGE_LANG = array_merge($_USER_LANG,$_PRE_LANG);		

		C('_LANG',$_MERGE_LANG);
		$this->assign('lang',$_MERGE_LANG);
	}
}
