<?php
namespace Home\Model;
use Think\Model;

class CartModel extends Model{

	/**
     * 调用购物车信息
     *
     * @return  string
     */
    public function insert_cart_info()
    {
    	$condition = array();
    	$condition['session_id'] = $session_id;
    	$condition['rec_type'] = $rec_type;
    	$fields = array(
    		'sum(goods_number)' => 'number',
    		'sum(goods_price*goods_number)' => 'amount',
    		);

    	$query = $this->field($fields)->where($condition)->find();

    	if ($query)
        {
            $number = intval($query['number']);
            $amount = floatval($query['amount']);
        }
        else
        {
            $number = 0;
            $amount = 0;
        }	
    	$str = sprintf(C('_LANG.cart_info'), $number, $amount);
        // $str="暂时不懂";
    	return '<a href="flow.php" title="' . $GLOBALS['_LANG']['view_cart'] . '">' . $str . '</a>';

        /*$sql = 'SELECT SUM(goods_number) AS number, SUM(goods_price * goods_number) AS amount' .
               ' FROM ' . $GLOBALS['ecs']->table('cart') .
               " WHERE session_id = '" . SESS_ID . "' AND rec_type = '" . CART_GENERAL_GOODS . "'";
        $row = $GLOBALS['db']->GetRow($sql);

        if ($row)
        {
            $number = intval($row['number']);
            $amount = floatval($row['amount']);
        }
        else
        {
            $number = 0;
            $amount = 0;
        }

        $str = sprintf($GLOBALS['_LANG']['cart_info'], $number, price_format($amount, false));

        return '<a href="flow.php" title="' . $GLOBALS['_LANG']['view_cart'] . '">' . $str . '</a>';*/
    }


    /**
     * 获得购物车中的商品
     *
     * @access  public
     * @return  array
     */
    function get_cart_goods()
    {
        /* 初始化 */
        $goods_list = array();
        $total = array(
            'goods_price'  => 0, // 本店售价合计（有格式）
            'market_price' => 0, // 市场售价合计（有格式）
            'saving'       => 0, // 节省金额（有格式）
            'save_rate'    => 0, // 节省百分比
            'goods_amount' => 0, // 本店售价合计（无格式）
        );

        $sess_id = C('SESS_ID');
        $cart_general_goods = C('CART_GENERAL_GOODS');
       
        $fields = array('*','IF(parent_id, parent_id, goods_id)' => 'pid');
        $condition = array(
            'session_id' => $sess_id,
            'rec_type' => $cart_general_goods
        );
        $order = ' pid, parent_id';

        /* 循环、统计 */
        $res = $this->fetchSql(false)->field($fields)->where($condition)->order($order)->select();
       
        /* 用于统计购物车中实体商品和虚拟商品的个数 */
        $virtual_goods_count = 0;
        $real_goods_count    = 0;

        foreach($res as $row)
        {
            $total['goods_price']  += $row['goods_price'] * $row['goods_number'];
            $total['market_price'] += $row['market_price'] * $row['goods_number'];

            $row['subtotal']     = price_format($row['goods_price'] * $row['goods_number'], false);
            $row['goods_price']  = price_format($row['goods_price'], false);
            $row['market_price'] = price_format($row['market_price'], false);

            /* 统计实体商品和虚拟商品的个数 */
            if ($row['is_real'])
            {
                $real_goods_count++;
            }
            else
            {
                $virtual_goods_count++;
            }

            /* 查询规格 */
            if (trim($row['goods_attr']) != '')
            {
                $row['goods_attr']=addslashes($row['goods_attr']);
                $GoodsAttr = $this->_goods_attr_model();
                $attr_list = $GoodsAttr->get_value_list($row['goods_attr']);

                foreach ($attr_list AS $attr)
                {
                    $row['goods_name'] .= ' [' . $attr . '] ';
                }
            }
            /* 增加是否在购物车里显示商品图 */
            if (($GLOBALS['_CFG']['show_goods_in_cart'] == "2" || $GLOBALS['_CFG']['show_goods_in_cart'] == "3") && $row['extension_code'] != 'package_buy')
            {
                $Goods = $this->_goods_model();
                $goods_thumb = $Goods->get_goods_thumb($row['goods_id']);                
                
                $row['goods_thumb'] = get_image_path($row['goods_id'], $goods_thumb, true);
            }
            if ($row['extension_code'] == 'package_buy')
            {
                $row['package_goods_list'] = get_package_goods($row['goods_id']);
            }
            $goods_list[] = $row;
        }
        $total['goods_amount'] = $total['goods_price'];
        $total['saving']       = price_format($total['market_price'] - $total['goods_price'], false);
        if ($total['market_price'] > 0)
        {
            $total['save_rate'] = $total['market_price'] ? round(($total['market_price'] - $total['goods_price']) *
            100 / $total['market_price']).'%' : 0;
        }
        $total['goods_price']  = price_format($total['goods_price'], false);
        $total['market_price'] = price_format($total['market_price'], false);
        $total['real_goods_count']    = $real_goods_count;
        $total['virtual_goods_count'] = $virtual_goods_count;

        return array('goods_list' => $goods_list, 'total' => $total);
    }

    protected function _goods_attr_model(){
        return new GoodsAttrModel();
    }

    protected function _goods_model(){
        return new GoodsModel();
    }

    /**
     * 获得指定分类下的子分类的数组
     *
     * @param   int     $cat_id     分类的ID
     * @param   int     $selected   当前选中分类的ID
     * @param   boolean $re_type    返回的类型: 值为真时返回下拉列表,否则返回数组
     * @param   int     $level      限定返回的级数。为0时返回所有级数
     * @param   int     $is_show_all 如果为true显示所有分类，如果为false隐藏不可见分类。
     * @return  mix
     */
    public function cat_list($cat_id = 0, $selected = 0, $re_type = true, $level = 0, $is_show_all = true)
    {
        // static $res = NULL;

        // if ($res === NULL)
        // {
            // $data = read_static_cache('cat_pid_releate');
            // if ($data === false)
            // {
        $fields = array(
            'c.cat_id',
            'c.cat_name',
            'c.measure_unit',
            'c.parent_id',
            'c.is_show',
            'c.show_in_nav',
            'c.grade',
            'c.sort_order',
            'COUNT(s.cat_id)' => 'has_children'
        );
        $res = $this->alias('c')->
        join('LEFT JOIN __CART__ s on s.parent_id = c.cat_id')->
        field($fields)->group('c.cat_id')->order('c.parent_id, c.sort_order ASC')->select();
                
                // $sql = "SELECT c.cat_id, c.cat_name, c.measure_unit, c.parent_id, c.is_show, c.show_in_nav, c.grade, c.sort_order, COUNT(s.cat_id) AS has_children ".
                //     'FROM ' . $GLOBALS['ecs']->table('category') . " AS c ".
                //     "LEFT JOIN " . $GLOBALS['ecs']->table('category') . " AS s ON s.parent_id=c.cat_id ".
                //     "GROUP BY c.cat_id ".
                //     'ORDER BY c.parent_id, c.sort_order ASC';
                // $res = $GLOBALS['db']->getAll($sql);
        $Goods = $this->_goods_model();
        $res2 = $Goods->get_cat_count();
                // $sql = "SELECT cat_id, COUNT(*) AS goods_num " .
                //         " FROM " . $GLOBALS['ecs']->table('goods') .
                //         " WHERE is_delete = 0 AND is_on_sale = 1 " .
                //         " GROUP BY cat_id";
                // $res2 = $GLOBALS['db']->getAll($sql);

        $res3 = $Goods->get_goods_cat_count();
                // $sql = "SELECT gc.cat_id, COUNT(*) AS goods_num " .
                //         " FROM " . $GLOBALS['ecs']->table('goods_cat') . " AS gc , " . $GLOBALS['ecs']->table('goods') . " AS g " .
                //         " WHERE g.goods_id = gc.goods_id AND g.is_delete = 0 AND g.is_on_sale = 1 " .
                //         " GROUP BY gc.cat_id";
                // $res3 = $GLOBALS['db']->getAll($sql);

                $newres = array();
                foreach($res2 as $k=>$v)
                {
                    $newres[$v['cat_id']] = $v['goods_num'];
                    foreach($res3 as $ks=>$vs)
                    {
                        if($v['cat_id'] == $vs['cat_id'])
                        {
                            $newres[$v['cat_id']] = $v['goods_num'] + $vs['goods_num'];
                        }
                    }
                }

                foreach($res as $k=>$v)
                {
                    $res[$k]['goods_num'] = !empty($newres[$v['cat_id']]) ? $newres[$v['cat_id']] : 0;
                }
                //如果数组过大，不采用静态缓存方式
                if (count($res) <= 1000)
                {
                    // write_static_cache('cat_pid_releate', $res);
                }
            // }
            // else
            // {
            //     $res = $data;
            // }
        // }

        if (empty($res) == true)
        {
            return $re_type ? '' : array();
        }

        $options = $this->cat_options($cat_id, $res); // 获得指定分类下的子分类的数组

        $children_level = 99999; //大于这个分类的将被删除
        if ($is_show_all == false)
        {
            foreach ($options as $key => $val)
            {
                if ($val['level'] > $children_level)
                {
                    unset($options[$key]);
                }
                else
                {
                    if ($val['is_show'] == 0)
                    {
                        unset($options[$key]);
                        if ($children_level > $val['level'])
                        {
                            $children_level = $val['level']; //标记一下，这样子分类也能删除
                        }
                    }
                    else
                    {
                        $children_level = 99999; //恢复初始值
                    }
                }
            }
        }

        /* 截取到指定的缩减级别 */
        if ($level > 0)
        {
            if ($cat_id == 0)
            {
                $end_level = $level;
            }
            else
            {
                $first_item = reset($options); // 获取第一个元素
                $end_level  = $first_item['level'] + $level;
            }

            /* 保留level小于end_level的部分 */
            foreach ($options AS $key => $val)
            {
                if ($val['level'] >= $end_level)
                {
                    unset($options[$key]);
                }
            }
        }

        if ($re_type == true)
        {
            $select = '';
            foreach ($options AS $var)
            {
                $select .= '<option value="' . $var['cat_id'] . '" ';
                $select .= ($selected == $var['cat_id']) ? "selected='ture'" : '';
                $select .= '>';
                if ($var['level'] > 0)
                {
                    $select .= str_repeat('&nbsp;', $var['level'] * 4);
                }
                $select .= htmlspecialchars(addslashes($var['cat_name']), ENT_QUOTES) . '</option>';
            }

            return $select;
        }
        else
        {
            foreach ($options AS $key => $value)
            {
                $options[$key]['url'] = build_uri('category', array('cid' => $value['cat_id']), $value['cat_name']);
            }

            return $options;
        }
    }

    /**
     * 过滤和排序所有分类，返回一个带有缩进级别的数组
     *
     * @param   int     $cat_id     上级分类ID
     * @param   array   $arr        含有所有分类的数组
     * @param   int     $level      级别
     * @return  void
     */
    private function cat_options($spec_cat_id, $arr)
    {
        static $cat_options = array();

        if (isset($cat_options[$spec_cat_id]))
        {
            return $cat_options[$spec_cat_id];
        }

        if (!isset($cat_options[0]))
        {
            $level = $last_cat_id = 0;
            $options = $cat_id_array = $level_array = array();
            $data = read_static_cache('cat_option_static');
            if ($data === false)
            {
                while (!empty($arr))
                {
                    foreach ($arr AS $key => $value)
                    {
                        $cat_id = $value['cat_id'];
                        if ($level == 0 && $last_cat_id == 0)
                        {
                            if ($value['parent_id'] > 0)
                            {
                                break;
                            }

                            $options[$cat_id]          = $value;
                            $options[$cat_id]['level'] = $level;
                            $options[$cat_id]['id']    = $cat_id;
                            $options[$cat_id]['name']  = $value['cat_name'];
                            unset($arr[$key]);

                            if ($value['has_children'] == 0)
                            {
                                continue;
                            }
                            $last_cat_id  = $cat_id;
                            $cat_id_array = array($cat_id);
                            $level_array[$last_cat_id] = ++$level;
                            continue;
                        }

                        if ($value['parent_id'] == $last_cat_id)
                        {
                            $options[$cat_id]          = $value;
                            $options[$cat_id]['level'] = $level;
                            $options[$cat_id]['id']    = $cat_id;
                            $options[$cat_id]['name']  = $value['cat_name'];
                            unset($arr[$key]);

                            if ($value['has_children'] > 0)
                            {
                                if (end($cat_id_array) != $last_cat_id)
                                {
                                    $cat_id_array[] = $last_cat_id;
                                }
                                $last_cat_id    = $cat_id;
                                $cat_id_array[] = $cat_id;
                                $level_array[$last_cat_id] = ++$level;
                            }
                        }
                        elseif ($value['parent_id'] > $last_cat_id)
                        {
                            break;
                        }
                    }

                    $count = count($cat_id_array);
                    if ($count > 1)
                    {
                        $last_cat_id = array_pop($cat_id_array);
                    }
                    elseif ($count == 1)
                    {
                        if ($last_cat_id != end($cat_id_array))
                        {
                            $last_cat_id = end($cat_id_array);
                        }
                        else
                        {
                            $level = 0;
                            $last_cat_id = 0;
                            $cat_id_array = array();
                            continue;
                        }
                    }

                    if ($last_cat_id && isset($level_array[$last_cat_id]))
                    {
                        $level = $level_array[$last_cat_id];
                    }
                    else
                    {
                        $level = 0;
                    }
                }
                //如果数组过大，不采用静态缓存方式
                if (count($options) <= 2000)
                {
                    write_static_cache('cat_option_static', $options);
                }
            }
            else
            {
                $options = $data;
            }
            $cat_options[0] = $options;
        }
        else
        {
            $options = $cat_options[0];
        }

        if (!$spec_cat_id)
        {
            return $options;
        }
        else
        {
            if (empty($options[$spec_cat_id]))
            {
                return array();
            }

            $spec_cat_id_level = $options[$spec_cat_id]['level'];

            foreach ($options AS $key => $value)
            {
                if ($key != $spec_cat_id)
                {
                    unset($options[$key]);
                }
                else
                {
                    break;
                }
            }

            $spec_cat_id_array = array();
            foreach ($options AS $key => $value)
            {
                if (($spec_cat_id_level == $value['level'] && $value['cat_id'] != $spec_cat_id) ||
                    ($spec_cat_id_level > $value['level']))
                {
                    break;
                }
                else
                {
                    $spec_cat_id_array[$key] = $value;
                }
            }
            $cat_options[$spec_cat_id] = $spec_cat_id_array;

            return $spec_cat_id_array;
        }
    }


}