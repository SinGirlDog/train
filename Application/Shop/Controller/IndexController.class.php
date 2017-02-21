<?php
namespace Shop\Controller;
use Think\Controller;
class IndexController extends Controller {

	function _initialize() {
		
		$this->_mergeConfig(); 		
	}

    public function index(){
    	
    	$Cart = D('Cart');
    	$cart_info = $Cart->insert_cart_info();
    	$this->assign('cart_info',$cart_info);

    	$Goods = D('Goods');
    	$top_goods = $Goods->get_top10();
    	$this->assign('top_goods',$top_goods);

        $Nav = D('Nav');
        $navigator_list = $Nav->get_navigator();        
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
        $this->assign('new_articles',$new_articles);

        $promotion_goods = $Goods->get_promote_goods();            
        $this->assign('promotion_goods',$promotion_goods);

        $Brand = D('Brand');
        $brand_list = $Brand->get_brands(); 
        $this->assign('brand_list',$brand_list);

        $best_goods = $Goods->get_recommend_goods('best');
        $new_goods = $Goods->get_recommend_goods('new');
        $hot_goods = $Goods->get_recommend_goods('hot');       
        $this->assign('best_goods',$best_goods);
        $this->assign('new_goods',$new_goods);
        $this->assign('hot_goods',$hot_goods);

        $cat_rec = $Category->get_cat_rec();
        $this->assign('cat_rec',$cat_rec);

        $auction_list = $GoodsActivity->index_get_auction();
        $group_buy_goods = $GoodsActivity->index_get_group_buy();
        $this->assign('auction_list',$auction_list);
        $this->assign('group_buy_goods',$group_buy_goods);

        $helps = $Article->get_shop_help();
        $this->assign('helps',$helps);

        $FriendLink = D('FriendLink');
        $links = $FriendLink->index_get_links(); 
        $this->assign('links',$links);

        $this->assign('copyright', 
            sprintf(C('_LANG.copyright'), date('Y'), C('_CFG.shop_name')));
        $this->assign('shop_address',  C('_CFG.shop_address'));
        $this->assign('shop_name',  C('_CFG.shop_name'));
        $this->assign('service_phone',  C('_CFG.service_phone'));
        $this->assign('service_email',  C('_CFG.service_email'));
        $this->assign('stats_code',    C('_CFG.stats_code'));
        $this->assign('qq',            explode(',', C('_CFG.qq')));
        $this->assign('ww',            explode(',', C('_CFG.ww')));
        $this->assign('ym',            explode(',', C('_CFG.ym')));
        $this->assign('msn',           explode(',', C('_CFG.msn')));
        $this->assign('skype',         explode(',', C('_CFG.skype')));
        $this->assign('icp_number',    C('_CFG.icp_number'));
        $this->assign('licensed',      license_info());
        $this->assign('feed_url', 
                (C('rewrite') == 1) ? "feed-typeactivity.xml" : 'feed.php?type=activity');
        // echo '<pre/>';print_r($links);die; 

    	$this->display(':index');
    }

    protected function _mergeConfig() {
		$_LANG = include ('./Application/Shop/Conf/lang_config.php');
        C('_LANG',$_LANG);
		$this->assign('lang',$_LANG);

        D('ShopConfig')->load_shop_config();
	}
}