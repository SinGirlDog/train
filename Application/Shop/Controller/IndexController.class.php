<?php
namespace Shop\Controller;
use Think\Controller;
class IndexController extends Controller {

	function _initialize() {
		
		$this->_mergeConfig(); 		
	}

    public function index(){
    	
    	$cart = D('Cart');
    	$cart_info = $cart->insert_cart_info();
    	$this->assign('cart_info',$cart_info);

    	$goods = D('Goods');
    	$top_goods = $goods->get_top10();
    	$this->assign('top_goods',$top_goods);

        $nav = D('Nav');
        $navigator_list = $nav->get_navigator();        
        $this->assign('navigator_list',$navigator_list);

        $Category = D('Category');
        $categories = $Category->get_categories_tree();  
        $this->assign('categories',$categories);

        $GoodsActivity = D('GoodsActivity');
        $promotion_info = $GoodsActivity->get_promotion_info();            
        $this->assign('promotion_info',$promotion_info);

        $OrderInfo = D('OrderInfo');
        $invoice_list = $OrderInfo->index_get_invoice_query();  
        // echo '<pre/>';print_r($invoice_list);die;        
        $this->assign('invoice_list',$invoice_list);

    	$this->display(':index');
    }

    protected function _mergeConfig() {
		$_LANG = include ('./Application/Shop/Conf/lang_config.php');
		$this->assign('lang',$_LANG);
	}
}