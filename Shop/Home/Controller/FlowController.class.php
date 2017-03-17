<?php
namespace Home\Controller;
use Think\Controller;
/**
* 
*/
class FlowController extends IndexController
{
	function _initialize() {
		parent::_initialize();
		
		$this->_mergeConfig();

        $this->data_prepare();	

		$this->step = I('param.step') ? I('param.step') : 'cart';
	}
	
	
	public function index(){

		switch($this->step){
			case 'cart':
				$this->cart();
			break;
			default:
			break;
		}
		$this->display('lbi:flow');
	}

	protected function cart(){
		$Cart = D('Cart');
		$cart_goods = $Cart->get_cart_goods();
    	$this->assign('goods_list', $cart_goods['goods_list']);
    	$this->assign('total', $cart_goods['total']);


    	$this->assign('show_goods_attribute', C('_CFG.show_attr_in_cart'));
    	$this->assign('show_goods_attribute', C('_CFG.show_attr_in_cart'));

    	echo 'FavourableActivityModel->compute_discount';die;
		// echo('<pre/>'); var_dump($cart_goods);die;;

	}

	protected function data_prepare(){
		parent::data_prepare();

		$this->assign('show_marketprice', C('_CFG.show_marketprice'));

	}
}
