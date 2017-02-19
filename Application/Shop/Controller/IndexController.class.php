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
        $this->assign('invoice_list',$invoice_list);

        $Vote = D('Vote');
        $vote = $Vote->get_vote();  
        $this->assign('vote',$vote);

        $this->assign('index_ad',C('_CFG.index_ad'));
        $this->assign('flash_theme',C('_CFG.flash_theme'));

        $AdCustom = D('AdCustom');
        $ad = $AdCustom->get_index_ad_data(C('_CFG.index_ad'));      
        $this->assign('ad',$ad);

        $Article = D('Article');
        $new_articles = $Article->index_get_new_articles();  
        // echo '<pre/>';print_r($new_articles);die;
        $this->assign('new_articles',$new_articles);

    	$this->display(':index');
    }

    protected function _mergeConfig() {
		$_LANG = include ('./Application/Shop/Conf/lang_config.php');
        // C('_LANG',$_LANG);
		$this->assign('lang',C('_LANG'));

        D('ShopConfig')->load_shop_config();
	}
}