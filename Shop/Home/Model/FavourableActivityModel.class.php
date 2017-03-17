<?php
namespace Home\Model;
use Think\Model;

/**
* 
*/
class FavourableActivityModel extends Model
{
	
	/**
	 * 计算折扣：根据购物车和优惠活动
	 * @return  float   折扣
	 */
	function compute_discount()
	{		
	    /* 查询优惠活动 */
	    $now = gmtime();
		$rank_id = session('user_rank_id');//有些混淆session里存的应该是id
	    $fat_discount = C('FAT_DISCOUNT');
	    $fat_price = C('FAT_PRICE');

	    $condition = array(
	    	'start_time' => array('ELT',$now),
	    	'end_time' => array('EGT',$now),
	    	'user_rank' => array('LIKE','%'.$rank_id.'%'),
	    	'act_type' => arrayy('IN',array($fat_discount,$fat_price)),
	    );
	    $favourable_list = $this->where($condition)->select();

	    // $sql = "SELECT *" .
	    //         "FROM " . $GLOBALS['ecs']->table('favourable_activity') .
	    //         " WHERE start_time <= '$now'" .
	    //         " AND end_time >= '$now'" .
	    //         " AND CONCAT(',', user_rank, ',') LIKE '%" . $rank_id . "%'" .
	    //         " AND act_type " . db_create_in(array(FAT_DISCOUNT, FAT_PRICE));
	    // $favourable_list = $GLOBALS['db']->getAll($sql);
	    if (!$favourable_list)
	    {
	        return 0;
	    }

	    /* 查询购物车商品 */
	    $Goods = $this->_goods_model();
	    $goods_list = $Goods->get_gwch_goods();

	    // $sql = "SELECT c.goods_id, c.goods_price * c.goods_number AS subtotal, g.cat_id, g.brand_id " .
	    //         "FROM " . $GLOBALS['ecs']->table('cart') . " AS c, " . $GLOBALS['ecs']->table('goods') . " AS g " .
	    //         "WHERE c.goods_id = g.goods_id " .
	    //         "AND c.session_id = '" . SESS_ID . "' " .
	    //         "AND c.parent_id = 0 " .
	    //         "AND c.is_gift = 0 " .
	    //         "AND rec_type = '" . CART_GENERAL_GOODS . "'";
	    // $goods_list = $GLOBALS['db']->getAll($sql);
	    if (!$goods_list)
	    {
	        return 0;
	    }

	    /* 初始化折扣 */
	    $discount = 0;
	    $favourable_name = array();

	    $far_all = C('FAR_ALL');
	    $far_category = C('FAR_CATEGORY');

	    /* 循环计算每个优惠活动的折扣 */
	    foreach ($favourable_list as $favourable)
	    {
	        $total_amount = 0;
	        switch($favourable['act_range']){
	        	
	        	case $far_all:

	        		foreach ($goods_list as $goods){
		                $total_amount += $goods['subtotal'];
		            }
	        	break;
	        	case $far_category:

		        	/* 找出分类id的子分类id */
		            $id_list = array();
		            $raw_id_list = explode(',', $favourable['act_range_ext']);
		            foreach ($raw_id_list as $id){
		                $id_list = array_merge($id_list, array_keys(cat_list($id, 0, false)));
		            }
		            $ids = join(',', array_unique($id_list));

		            foreach ($goods_list as $goods)
		            {
		                if (strpos(',' . $ids . ',', ',' . $goods['cat_id'] . ',') !== false)
		                {
		                    $total_amount += $goods['subtotal'];
		                }
		            }
	        	break;
	        	default :
	        	break;
	        }
	        if ($favourable['act_range'] == C('FAR_ALL'))
	        {
	            foreach ($goods_list as $goods)
	            {
	                $total_amount += $goods['subtotal'];
	            }
	        }
	        elseif ($favourable['act_range'] == FAR_CATEGORY)
	        {
	            /* 找出分类id的子分类id */
	            $id_list = array();
	            $raw_id_list = explode(',', $favourable['act_range_ext']);
	            foreach ($raw_id_list as $id)
	            {
	                $id_list = array_merge($id_list, array_keys(cat_list($id, 0, false)));
	            }
	            $ids = join(',', array_unique($id_list));

	            foreach ($goods_list as $goods)
	            {
	                if (strpos(',' . $ids . ',', ',' . $goods['cat_id'] . ',') !== false)
	                {
	                    $total_amount += $goods['subtotal'];
	                }
	            }
	        }
	        elseif ($favourable['act_range'] == FAR_BRAND)
	        {
	            foreach ($goods_list as $goods)
	            {
	                if (strpos(',' . $favourable['act_range_ext'] . ',', ',' . $goods['brand_id'] . ',') !== false)
	                {
	                    $total_amount += $goods['subtotal'];
	                }
	            }
	        }
	        elseif ($favourable['act_range'] == FAR_GOODS)
	        {
	            foreach ($goods_list as $goods)
	            {
	                if (strpos(',' . $favourable['act_range_ext'] . ',', ',' . $goods['goods_id'] . ',') !== false)
	                {
	                    $total_amount += $goods['subtotal'];
	                }
	            }
	        }
	        else
	        {
	            continue;
	        }

	        /* 如果金额满足条件，累计折扣 */
	        if ($total_amount > 0 && $total_amount >= $favourable['min_amount'] && ($total_amount <= $favourable['max_amount'] || $favourable['max_amount'] == 0))
	        {
	            if ($favourable['act_type'] == FAT_DISCOUNT)
	            {
	                $discount += $total_amount * (1 - $favourable['act_type_ext'] / 100);

	                $favourable_name[] = $favourable['act_name'];
	            }
	            elseif ($favourable['act_type'] == FAT_PRICE)
	            {
	                $discount += $favourable['act_type_ext'];

	                $favourable_name[] = $favourable['act_name'];
	            }
	        }
	    }

	    return array('discount' => $discount, 'name' => $favourable_name);
	}

	protected function _goods_model(){
		return new GoodsModel();
	}

}
