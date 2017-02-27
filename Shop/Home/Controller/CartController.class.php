<?php
namespace Shop\Controller;
use Think\Controller;

class CartController extends Controller{

	public function index(){

		$Cart = D('Cart');
    	$cart_info = $Cart->insert_cart_info();
    	$this->assign('cart_info',$cart_info);
    	$this->display(':lbi:cart');
	}
}