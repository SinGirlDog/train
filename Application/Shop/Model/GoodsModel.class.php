<?php
namespace Shop\Model;
use Think\Model;

class GoodsModel extends Model{

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

    $time = gmtime();
    $order_type = C('_CFG.recommend_order');
    $discount = I('session.discount',0);

    /* 取得促销lbi的数量限制 */
    $num = D('Template')->get_library_number("recommend_promotion");
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
    if($order_type){
        $order = ('rnd');
    }
    else{
        $order = ('g.sort_order, g.last_update DESC');
    }

    $result = $this->fetchSql(false)->alias('g')->
    join('LEFT JOIN __BRAND__ b on b.brand_id = g.brand_id')->
    join('LEFT JOIN __MEMBER_PRICE__ mp on mp.goods_id = g.goods_id')->
    field($fields)->where($cond)->select();

    $goods = array();
    foreach ($result AS $idx => $row)
    {
        if ($row['promote_price'] > 0)
        {
            $promote_price = bargain_price($row['promote_price'], $row['promote_start_date'], $row['promote_end_date']);
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
        $goods[$idx]['goods_style_name']   = $this->add_style($row['goods_name'],$row['goods_name_style']);
        $goods[$idx]['short_name']   = $GLOBALS['_CFG']['goods_name_length'] > 0 ? sub_str($row['goods_name'], $GLOBALS['_CFG']['goods_name_length']) : $row['goods_name'];
        $goods[$idx]['short_style_name']   = $this->add_style($goods[$idx]['short_name'],$row['goods_name_style']);
        $goods[$idx]['market_price'] = price_format($row['market_price']);
        $goods[$idx]['shop_price']   = price_format($row['shop_price']);
        $goods[$idx]['thumb']        = get_image_path($row['goods_id'], $row['goods_thumb'], true);
        $goods[$idx]['goods_img']    = get_image_path($row['goods_id'], $row['goods_img']);
        $goods[$idx]['url']          = build_uri('goods', array('gid' => $row['goods_id']), $row['goods_name']);
    }

    return $goods;
}

/**
 * 添加商品名样式
 * @param   string     $goods_name     商品名称
 * @param   string     $style          样式参数
 * @return  string
 */
protected function add_style($goods_name, $style)
{
    $goods_style_name = $goods_name;

    $arr   = explode('+', $style);

    $font_color     = !empty($arr[0]) ? $arr[0] : '';
    $font_style = !empty($arr[1]) ? $arr[1] : '';

    if ($font_color!='')
    {
        $goods_style_name = '<font color=' . $font_color . '>' . $goods_style_name . '</font>';
    }
    if ($font_style != '')
    {
        $goods_style_name = '<' . $font_style .'>' . $goods_style_name . '</' . $font_style . '>';
    }
    return $goods_style_name;
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
    field($fields)->where($cond)->select();

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
        $goods[$idx]['goods_style_name']   = $this->add_style($row['goods_name'],$row['goods_name_style']);
        $goods[$idx]['short_name']   = $GLOBALS['_CFG']['goods_name_length'] > 0 ? sub_str($row['goods_name'], $GLOBALS['_CFG']['goods_name_length']) : $row['goods_name'];
        $goods[$idx]['short_style_name']   = $this->add_style($goods[$idx]['short_name'],$row['goods_name_style']);
        $goods[$idx]['market_price'] = price_format($row['market_price']);
        $goods[$idx]['shop_price']   = price_format($row['shop_price']);
        $goods[$idx]['thumb']        = get_image_path($row['goods_id'], $row['goods_thumb'], true);
        $goods[$idx]['goods_img']    = get_image_path($row['goods_id'], $row['goods_img']);
        $goods[$idx]['url']          = build_uri('goods', array('gid' => $row['goods_id']), $row['goods_name']);
    }
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

    /*$fields = array(
        'g.goods_id',
        'g.is_'.$type,         
        'g.is_promote', 
        'b.brand_name',
        'g.sort_order'
    );
    $cond =  array(
        'g.is_on_sale' => 1,
        'g.is_alone_sale' => 1,
        'g.is_'.$type => 1,
    );
    $num = D('Template')->get_library_number('recommend_'.$type);
    $order_type = C('_CFG.recommend_order');
    if($order_type == 0){
        $order_real = 'g.sort_order, g.last_update DESC';
    }
    else{
         $order_real = 'g.last_update DESC';
    }
    
    $res = $this->fetchSql(true)->alias('g')->
    join('LEFT JOIN __BRAND__ b on b.brand_id = g.brand_id')->
    field($fields)->where($cond)->order($order_real)->
    limit($num)->select();

    $time = gmtime();
    

    return $res;*/

    //取不同推荐对应的商品
    static $type_goods = array();
    if (empty($type_goods[$type]))
    {
        //初始化数据
        $type_goods['best'] = array();
        $type_goods['new'] = array();
        $type_goods['hot'] = array();
        $data = read_static_cache('recommend_goods');
        if ($data === false)
        {
            $sql = 'SELECT g.goods_id, g.is_best, g.is_new, g.is_hot, g.is_promote, b.brand_name,g.sort_order ' .
               ' FROM ' . $GLOBALS['ecs']->table('goods') . ' AS g ' .
               ' LEFT JOIN ' . $GLOBALS['ecs']->table('brand') . ' AS b ON b.brand_id = g.brand_id ' .
               ' WHERE g.is_on_sale = 1 AND g.is_alone_sale = 1 AND g.is_delete = 0 AND (g.is_best = 1 OR g.is_new =1 OR g.is_hot = 1)'.
               ' ORDER BY g.sort_order, g.last_update DESC';
            $goods_res = $GLOBALS['db']->getAll($sql);
            //定义推荐,最新，热门，促销商品
            $goods_data['best'] = array();
            $goods_data['new'] = array();
            $goods_data['hot'] = array();
            $goods_data['brand'] = array();
            if (!empty($goods_res))
            {
                foreach($goods_res as $data)
                {
                    if ($data['is_best'] == 1)
                    {
                        $goods_data['best'][] = array('goods_id' => $data['goods_id'], 'sort_order' => $data['sort_order']);
                    }
                    if ($data['is_new'] == 1)
                    {
                        $goods_data['new'][] = array('goods_id' => $data['goods_id'], 'sort_order' => $data['sort_order']);
                    }
                    if ($data['is_hot'] == 1)
                    {
                        $goods_data['hot'][] = array('goods_id' => $data['goods_id'], 'sort_order' => $data['sort_order']);
                    }
                    if ($data['brand_name'] != '')
                    {
                        $goods_data['brand'][$data['goods_id']] = $data['brand_name'];
                    }
                }
            }
            write_static_cache('recommend_goods', $goods_data);
        }
        else
        {
            $goods_data = $data;
        }

        $time = gmtime();
        $order_type = $GLOBALS['_CFG']['recommend_order'];

        //按推荐数量及排序取每一项推荐显示的商品 order_type可以根据后台设定进行各种条件显示
        static $type_array = array();
        $type2lib = array('best'=>'recommend_best', 'new'=>'recommend_new', 'hot'=>'recommend_hot');
        if (empty($type_array))
        {
            foreach($type2lib as $key => $data)
            {
                if (!empty($goods_data[$key]))
                {
                    $num = get_library_number($data);
                    $data_count = count($goods_data[$key]);
                    $num = $data_count > $num  ? $num : $data_count;
                    if ($order_type == 0)
                    {
                        //usort($goods_data[$key], 'goods_sort');
                        $rand_key = array_slice($goods_data[$key], 0, $num);
                        foreach($rand_key as $key_data)
                        {
                            $type_array[$key][] = $key_data['goods_id'];
                        }
                    }
                    else
                    {
                        $rand_key = array_rand($goods_data[$key], $num);
                        if ($num == 1)
                        {
                            $type_array[$key][] = $goods_data[$key][$rand_key]['goods_id'];
                        }
                        else
                        {
                            foreach($rand_key as $key_data)
                            {
                                $type_array[$key][] = $goods_data[$key][$key_data]['goods_id'];
                            }
                        }
                    }
                }
                else
                {
                    $type_array[$key] = array();
                }
            }
        }

        //取出所有符合条件的商品数据，并将结果存入对应的推荐类型数组中
        $sql = 'SELECT g.goods_id, g.goods_name, g.goods_name_style, g.market_price, g.shop_price AS org_price, g.promote_price, ' .
                "IFNULL(mp.user_price, g.shop_price * '$_SESSION[discount]') AS shop_price, ".
                "promote_start_date, promote_end_date, g.goods_brief, g.goods_thumb, g.goods_img, RAND() AS rnd " .
                'FROM ' . $GLOBALS['ecs']->table('goods') . ' AS g ' .
                "LEFT JOIN " . $GLOBALS['ecs']->table('member_price') . " AS mp ".
                "ON mp.goods_id = g.goods_id AND mp.user_rank = '$_SESSION[user_rank]' ";
        $type_merge = array_merge($type_array['new'], $type_array['best'], $type_array['hot']);
        $type_merge = array_unique($type_merge);
        $sql .= ' WHERE g.goods_id ' . db_create_in($type_merge);
        $sql .= ' ORDER BY g.sort_order, g.last_update DESC';

        $result = $GLOBALS['db']->getAll($sql);
        foreach ($result AS $idx => $row)
        {
            if ($row['promote_price'] > 0)
            {
                $promote_price = bargain_price($row['promote_price'], $row['promote_start_date'], $row['promote_end_date']);
                $goods[$idx]['promote_price'] = $promote_price > 0 ? price_format($promote_price) : '';
            }
            else
            {
                $goods[$idx]['promote_price'] = '';
            }

            $goods[$idx]['id']           = $row['goods_id'];
            $goods[$idx]['name']         = $row['goods_name'];
            $goods[$idx]['brief']        = $row['goods_brief'];
            $goods[$idx]['brand_name']   = isset($goods_data['brand'][$row['goods_id']]) ? $goods_data['brand'][$row['goods_id']] : '';
            $goods[$idx]['goods_style_name']   = add_style($row['goods_name'],$row['goods_name_style']);

            $goods[$idx]['short_name']   = $GLOBALS['_CFG']['goods_name_length'] > 0 ?
                                               sub_str($row['goods_name'], $GLOBALS['_CFG']['goods_name_length']) : $row['goods_name'];
            $goods[$idx]['short_style_name']   = add_style($goods[$idx]['short_name'],$row['goods_name_style']);
            $goods[$idx]['market_price'] = price_format($row['market_price']);
            $goods[$idx]['shop_price']   = price_format($row['shop_price']);
            $goods[$idx]['thumb']        = get_image_path($row['goods_id'], $row['goods_thumb'], true);
            $goods[$idx]['goods_img']    = get_image_path($row['goods_id'], $row['goods_img']);
            $goods[$idx]['url']          = build_uri('goods', array('gid' => $row['goods_id']), $row['goods_name']);
            if (in_array($row['goods_id'], $type_array['best']))
            {
                $type_goods['best'][] = $goods[$idx];
            }
            if (in_array($row['goods_id'], $type_array['new']))
            {
                $type_goods['new'][] = $goods[$idx];
            }
            if (in_array($row['goods_id'], $type_array['hot']))
            {
                $type_goods['hot'][] = $goods[$idx];
            }
        }
    }
    return $type_goods[$type];
}


}