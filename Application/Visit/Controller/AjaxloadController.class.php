<?php
/*
 *异步加载多级联动select
 **/
namespace Visit\Controller;
use Think\Controller;
class AjaxloadController extends Controller {

	public function index(){

		$province = D('Province');
		$provinceList = $province->searchProvince();
		$this->assign('provinceList',$provinceList);

		$linkage = D('Linkage');
		$parentList = $linkage->searchParent();
		$this->assign('parentList',$parentList);

		$this->display(':Ajaxload:index');
	}

	public function ajaxLoadCity(){

		$province_id = I('post.provinceID');		
		$city = D('City');	
		$cityHtml = $city->htmlCity($province_id);

		$this->ajaxReturn($cityHtml,'',1);
	}

	public function linkage(){
		$parent_id = I('post.parent_id');
		$link = D('Linkage');

		$backHtml = $link->htmlBack($parent_id);

		$this->ajaxReturn($backHtml,'',1);
	}
}

