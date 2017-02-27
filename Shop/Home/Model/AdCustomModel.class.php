<?php
namespace Home\Model;
use Think\Model;

class AdCustomModel extends Model{
	/* 首页主广告设置 */
    public function get_index_ad_data($index_ad = ''){

    	if ($index_ad == 'cus' || true)
	    {
	    	$fields = array('ad_type', 'content', 'url');
	    	$cond = array('ad_status'=>1);
	    	$ad = $this->field($fields)->where($cond)->find();
	        return $ad;
	    }
    }
    

}