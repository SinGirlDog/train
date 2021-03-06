<?php
namespace Home\Model;
use Think\Model;

class GoodsModel extends Model{

    public function get_goods_thumb($id=0){
        $field = array('goods_thumb');
        $condition = array('goods_id' => $id);
        $goods_thumb = $this->field($fields)->where($condition)->getField();
        return $goods_thumb;
    }
    /**
     * 调用当前分类的销售排行榜
     *
     ** @param   string  $cats   查询的分类
     * @return  array
     */
    public function get_top10($cats = '')
    {
    	$condition = array(
    		'is_on_sale' => 1,
    		'is_alone_sale' => 1,
    		'is_delete' => 0,
    		);
    	
    	$fields = array(
    		'goods_id',
    		'goods_name',
    		'shop_price',
    		'goods_thumb',
    		// 'sum(goods_number)' => 'goods_number',		
    		);
    	  
        $query = $this->fetchSql(false)->field($fields)->where($condition)->order('goods_number DESC')->limit(10)->select();
    	
    	return $query;

    	/*  $cats = get_children($cats);
        $where = !empty($cats) ? "AND ($cats OR " . get_extension_goods($cats) . ") " : '';

        // 排行统计的时间
        switch ($GLOBALS['_CFG']['top10_time'])
        {
            case 1: // 一年
                $top10_time = "AND o.order_sn >= '" . date('Ymd', gmtime() - 365 * 86400) . "'";
            break;
            case 2: // 半年
                $top10_time = "AND o.order_sn >= '" . date('Ymd', gmtime() - 180 * 86400) . "'";
            break;
            case 3: // 三个月
                $top10_time = "AND o.order_sn >= '" . date('Ymd', gmtime() - 90 * 86400) . "'";
            break;
            case 4: // 一个月
                $top10_time = "AND o.order_sn >= '" . date('Ymd', gmtime() - 30 * 86400) . "'";
            break;
            default:
                $top10_time = '';
        }

        $sql = 'SELECT g.goods_id, g.goods_name, g.shop_price, g.goods_thumb, SUM(og.goods_number) as goods_number ' .
               'FROM ' . $GLOBALS['ecs']->table('goods') . ' AS g, ' .
                    $GLOBALS['ecs']->table('order_info') . ' AS o, ' .
                    $GLOBALS['ecs']->table('order_goods') . ' AS og ' .
               "WHERE g.is_on_sale = 1 AND g.is_alone_sale = 1 AND g.is_delete = 0 $where $top10_time " ;
        //判断是否启用库存，库存数量是否大于0
        if ($GLOBALS['_CFG']['use_storage'] == 1)
        {
            $sql .= " AND g.goods_number > 0 ";
        }
        $sql .= ' AND og.order_id = o.order_id AND og.goods_id = g.goods_id ' .
               "AND (o.order_status = '" . OS_CONFIRMED .  "' OR o.order_status = '" . OS_SPLITED . "') " .
               "AND (o.pay_status = '" . PS_PAYED . "' OR o.pay_status = '" . PS_PAYING . "') " .
               "AND (o.shipping_status = '" . SS_SHIPPED . "' OR o.shipping_status = '" . SS_RECEIVED . "') " .
               'GROUP BY g.goods_id ORDER BY goods_number DESC, g.goods_id DESC LIMIT ' . $GLOBALS['_CFG']['top_number'];
               
        $arr = $GLOBALS['db']->getAll($sql);

        for ($i = 0, $count = count($arr); $i < $count; $i++)
        {
            $arr[$i]['short_name'] = $GLOBALS['_CFG']['goods_name_length'] > 0 ?
                                        sub_str($arr[$i]['goods_name'], $GLOBALS['_CFG']['goods_name_length']) : $arr[$i]['goods_name'];
            $arr[$i]['url']        = build_uri('goods', array('gid' => $arr[$i]['goods_id']), $arr[$i]['goods_name']);
            $arr[$i]['thumb'] = get_image_path($arr[$i]['goods_id'], $arr[$i]['goods_thumb'],true);
            $arr[$i]['price'] = price_format($arr[$i]['shop_price']);
        }

        return $arr;*/
       
    }


    /**
     * 获得促销商品
     *
     * @return  array
     */
    public function get_promote_goods($cats = '')
    {
        $result = $this->get_goods_by_type('promotion');
        $goods = $this->goods_data_remake($result);
        return $goods;
    }

    /**
     * 获得推荐商品
     *
     * @param   string      $type       推荐类型，可以是 best, new, hot
     * @return  array
     */
    public function get_recommend_goods($type = '', $cats = '')
    {
        if (!in_array($type, array('best', 'new', 'hot')))
        {
            return array();
        }

        $result = $this->get_goods_by_type($type);
        $goods = $this->goods_data_remake($result);
        return $goods;

    }

    /**
    *
    * 根据促销类型获取商品
    *   left join brand &　member_price
    *
    ***/
    public function get_goods_by_type($type = '',$cat = ''){

        $goods_data = array();
        $time = gmtime();
        $order_type = C('_CFG.recommend_order');
        $discount = I('session.discount',0);

        /* 取得促销lbi的数量限制 */
        $num = D('Template')->get_library_number('recommend_'.$type);
        $fields = array(
            'g.goods_id', 
            'g.goods_name',
            'g.goods_name_style',
            'g.market_price', 
            'g.shop_price ' => 'org_price',
            'g.promote_price',
            'IFNULL(mp.user_price,g.shop_price *'.$discount.')' => 'shop_price',
            'promote_start_date', 
            'promote_end_date', 
            'g.goods_brief', 
            'g.goods_thumb', 
            'goods_img',
            'b.brand_name',                
            'g.is_best', 
            'g.is_new', 
            'g.is_hot', 
            'g.is_promote', 
            'RAND()' => 'rnd'
        );
        $cond = array(
            'g.is_on_sale' => 1,
            // 'mp.user_rank' => I('session.user_rank',2),
            'g.is_alone_sale' => 1,
            'g.is_delete' => 0,
            'g.is_promote' => 1,
            'promote_start_date' => array('ELT',$time),
            'promote_end_date' => array('EGT',$time),
        );
        $ses_user_rank = I('session.user_rank');
        if($ses_user_rank){
            $cond['mp.user_rank'] = $ses_user_rank;
        }
        
        if (in_array($type, array('best', 'new', 'hot'))){
            $cond['is_'.$type] = 1;
        }

        if($order_type){
            $order = ('rnd');
        }
        else{
            $order = ('g.sort_order, g.last_update DESC');
        }

        $goods_data = $this->fetchSql(false)->alias('g')->
        join('LEFT JOIN __BRAND__ b on b.brand_id = g.brand_id')->
        join('LEFT JOIN __MEMBER_PRICE__ mp on mp.goods_id = g.goods_id')->
        field($fields)->where($cond)->limit($num)->select();

        return $goods_data;
    }


    /**
    *
    * 将查询结果重组 更适合展示
    *
    **/
    protected function goods_data_remake($goods_data = array()){
        $goods = array();
        foreach ($goods_data AS $idx => $row)
        {
            if ($row['promote_price'] > 0)
            {
                $promote_price = $this->bargain_price($row['promote_price'], $row['promote_start_date'], $row['promote_end_date']);
                $goods[$idx]['promote_price'] = $promote_price > 0 ? price_format($promote_price) : '';
            }
            else
            {
                $goods[$idx]['promote_price'] = '';
            }

            $goods[$idx]['id']           = $row['goods_id'];
            $goods[$idx]['name']         = $row['goods_name'];
            $goods[$idx]['brief']        = $row['goods_brief'];
            $goods[$idx]['brand_name']   = $row['brand_name'];
            $goods[$idx]['goods_style_name']   = add_style($row['goods_name'],$row['goods_name_style']);
            $goods[$idx]['short_name']   = $GLOBALS['_CFG']['goods_name_length'] > 0 ? sub_str($row['goods_name'], $GLOBALS['_CFG']['goods_name_length']) : $row['goods_name'];
            $goods[$idx]['short_style_name']   = add_style($goods[$idx]['short_name'],$row['goods_name_style']);
            $goods[$idx]['market_price'] = price_format($row['market_price']);
            $goods[$idx]['shop_price']   = price_format($row['shop_price']);
            $goods[$idx]['thumb']        = get_image_path($row['goods_id'], $row['goods_thumb'], true);
            $goods[$idx]['goods_img']    = get_image_path($row['goods_id'], $row['goods_img']);
            $goods[$idx]['url']          = build_uri('goods', array('gid' => $row['goods_id']), $row['goods_name']);
        }
        return $goods;
    }


    /**
     * 判断某个商品是否正在特价促销期
     * @param   float   $price      促销价格
     * @param   string  $start      促销开始日期
     * @param   string  $end        促销结束日期
     * @return  float   如果还在促销期则返回促销价，否则返回0
     */
    protected function bargain_price($price, $start, $end)
    {
        if ($price == 0)
        {
            return 0;
        }
        else
        {
            $time = gmtime();
            if ($time >= $start && $time <= $end)
            {
                return $price;
            }
            else
            {
                return 0;
            }
        }
    }


    /* 查询购物车商品 */
    public function get_gwch_goods(){

        $goods_list = array();

        $fields = array(
            'c.goods_id',
            'c.goods_price * c.goods_number' => 'subtotal',
            'g.cat_id',
            'g.brand_id'
        );
        $condition = array(
            'c.session_id' => C('SESS_ID'),
            'c.parent_id' => '0 ',
            'c.is_gift' => '0',
            'rec_type' => C('CART_GENERAL_GOODS'),
        );
        $goods_list = $this->alias('g')->
        join('__CART__ c on c.goods_id = g.goods_id ')->
        field($fields)->where($condition)->select();

        return $goods_list;
    }

    public function get_cat_count(){
        $fields = array('cat_id', 'COUNT(*)' => 'goods_num');
        $condition = array(
            'is_delete' => 0,
            'is_on_sale' => 1,
        );
        $res = $this->field($fields)->where($condition)->group('cat_id')->select();
        return $res;
    }

    public function get_goods_cat_count(){
        $fields = array('gc.cat_id', 'COUNT(*)' => 'goods_num');
        $condition = array(
            'is_delete' => 0,
            'is_on_sale' => 1,
        );
        $res = $this->alias('g')->
        join('__GOODS_CAT__ gc on gc.goods_id = g.goods_id ')->
        field($fields)->where($condition)->group('gc.cat_id')->select();
        return $res;
    }
    
   
}