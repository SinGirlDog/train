<?php
namespace Shop\Controller;
use Think\Controller;
class IndexController extends Controller {

	function _initialize() {
		
		$this->_mergeConfig(); 		
	}

    public function index(){
    	
    	$cart = D('Cart');
    	$cartinfo = $cart->insert_cart_info();
    	$this->assign('cartinfo',$cartinfo);

    	$goods = D('Goods');
    	$top_goods = $goods->get_top10();
    	$this->assign('top_goods',$top_goods);

    	echo file_get_contents('page_header.html');
    	$this->display(':index');
    }

    protected function _mergeConfig() {
		$_LANG = include ('./Application/Shop/Conf/lang_config.php');
		$this->assign('lang',$_LANG);
	}
}