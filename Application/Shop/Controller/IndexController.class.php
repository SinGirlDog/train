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

        $nav = D('Nav');
        $navigator_list = $nav->get_navigator();
        $this->assign('navigator_list',$navigator_list);

    	$this->display(':index');
    }

    protected function _mergeConfig() {
		$_LANG = include ('./Application/Shop/Conf/lang_config.php');
		$this->assign('lang',$_LANG);
	}
}