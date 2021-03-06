<?php
namespace Home\Model;
use Think\Model;

class GoodsActivityModel extends Model{

    /**
     *  所有的促销活动信息
     *
     * @return  array
     */
    public function get_promotion_info($goods_id = '')
    {
        $snatch = array();
        $group = array();
        $auction = array();
        $package = array();
        $favourable = array();

        $gmtime = gmtime();

        $condition = array();
        $condition['is_finished'] = 0;
        $condition['start_time'] = array('ELT',$gmtime);
        $condition['end_time'] = array('EGT',$gmtime);
        if(!empty($goods_id))
        {
       		$condition['goods_id'] = $goods_id;        
        }
        $fields = array('act_id','act_name','act_type','start_time','end_time');

        $res = $this->fetchSql(false)->field($fields)->where($condition)->select();
        // return $res;
        
        foreach ($res as $data)
        {
            switch ($data['act_type'])
            {
                case GAT_SNATCH: //夺宝奇兵
                    $snatch[$data['act_id']]['act_name'] = $data['act_name'];
                    $snatch[$data['act_id']]['url'] = build_uri('snatch', array('sid' => $data['act_id']));
                    $snatch[$data['act_id']]['time'] = sprintf($GLOBALS['_LANG']['promotion_time'], local_date('Y-m-d', $data['start_time']), local_date('Y-m-d', $data['end_time']));
                    $snatch[$data['act_id']]['sort'] = $data['start_time'];
                    $snatch[$data['act_id']]['type'] = 'snatch';
                    break;

                case GAT_GROUP_BUY: //团购
                    $group[$data['act_id']]['act_name'] = $data['act_name'];
                    $group[$data['act_id']]['url'] = build_uri('group_buy', array('gbid' => $data['act_id']));
                    $group[$data['act_id']]['time'] = sprintf($GLOBALS['_LANG']['promotion_time'], local_date('Y-m-d', $data['start_time']), local_date('Y-m-d', $data['end_time']));
                    $group[$data['act_id']]['sort'] = $data['start_time'];
                    $group[$data['act_id']]['type'] = 'group_buy';
                    break;

                case GAT_AUCTION: //拍卖
                    $auction[$data['act_id']]['act_name'] = $data['act_name'];
                    $auction[$data['act_id']]['url'] = build_uri('auction', array('auid' => $data['act_id']));
                    $auction[$data['act_id']]['time'] = sprintf($GLOBALS['_LANG']['promotion_time'], local_date('Y-m-d', $data['start_time']), local_date('Y-m-d', $data['end_time']));
                    $auction[$data['act_id']]['sort'] = $data['start_time'];
                    $auction[$data['act_id']]['type'] = 'auction';
                    break;

                case GAT_PACKAGE: //礼包
                    $package[$data['act_id']]['act_name'] = $data['act_name'];
                    $package[$data['act_id']]['url'] = 'package.php#' . $data['act_id'];
                    $package[$data['act_id']]['time'] = sprintf($GLOBALS['_LANG']['promotion_time'], local_date('Y-m-d', $data['start_time']), local_date('Y-m-d', $data['end_time']));
                    $package[$data['act_id']]['sort'] = $data['start_time'];
                    $package[$data['act_id']]['type'] = 'package';
                    break;
            }
        }

        $user_rank = ',' . $_SESSION['user_rank'] . ',';
        $favourable = array();

        $condit = array();
        $favour_fields = array('act_id','act_range','act_range_ext','act_name','start_time', 'end_time' );
        $condit['start_time'] = array('ELT',$gmtime);
        $condit['end_time'] = array('EGT',$gmtime);
        if(!empty($goods_id))
        {
        	$condit['user_rank'] = array('LIKE','%'.$user_rank.'%');       
        }

        $res = $this->fetchSql(false)->table('sp_favourable_activity')->field($favour_fields)->where($condit)->select();
        // return $res;
       
        if(empty($goods_id))
        {
            foreach ($res as $rows)
            {
                $favourable[$rows['act_id']]['act_name'] = $rows['act_name'];
                $favourable[$rows['act_id']]['url'] = 'activity.php';
                $favourable[$rows['act_id']]['time'] = sprintf($GLOBALS['_LANG']['promotion_time'], local_date('Y-m-d', $rows['start_time']), local_date('Y-m-d', $rows['end_time']));
                $favourable[$rows['act_id']]['sort'] = $rows['start_time'];
                $favourable[$rows['act_id']]['type'] = 'favourable';
            }
        }
        else
        {
        	$cond = array();
        	$cond['goods_id'] = $goods_id;
        	$goods_fields = array('cat_id', 'brand_id');

        	$row = $this->table('sp_goods')->field($goods_fields)->where($cond)->find();
           
            $category_id = $row['cat_id'];
            $brand_id = $row['brand_id'];

            foreach ($res as $rows)
            {
                if ($rows['act_range'] == FAR_ALL)
                {
                    $favourable[$rows['act_id']]['act_name'] = $rows['act_name'];
                    $favourable[$rows['act_id']]['url'] = 'activity.php';
                    $favourable[$rows['act_id']]['time'] = sprintf($GLOBALS['_LANG']['promotion_time'], local_date('Y-m-d', $rows['start_time']), local_date('Y-m-d', $rows['end_time']));
                    $favourable[$rows['act_id']]['sort'] = $rows['start_time'];
                    $favourable[$rows['act_id']]['type'] = 'favourable';
                }
                elseif ($rows['act_range'] == FAR_CATEGORY)
                {
                    /* 找出分类id的子分类id */
                    $id_list = array();
                    $raw_id_list = explode(',', $rows['act_range_ext']);
                    foreach ($raw_id_list as $id)
                    {
                        $id_list = array_merge($id_list, array_keys(cat_list($id, 0, false)));
                    }
                    $ids = join(',', array_unique($id_list));

                    if (strpos(',' . $ids . ',', ',' . $category_id . ',') !== false)
                    {
                        $favourable[$rows['act_id']]['act_name'] = $rows['act_name'];
                        $favourable[$rows['act_id']]['url'] = 'activity.php';
                        $favourable[$rows['act_id']]['time'] = sprintf($GLOBALS['_LANG']['promotion_time'], local_date('Y-m-d', $rows['start_time']), local_date('Y-m-d', $rows['end_time']));
                        $favourable[$rows['act_id']]['sort'] = $rows['start_time'];
                        $favourable[$rows['act_id']]['type'] = 'favourable';
                    }
                }
                elseif ($rows['act_range'] == FAR_BRAND)
                {
                    if (strpos(',' . $rows['act_range_ext'] . ',', ',' . $brand_id . ',') !== false)
                    {
                        $favourable[$rows['act_id']]['act_name'] = $rows['act_name'];
                        $favourable[$rows['act_id']]['url'] = 'activity.php';
                        $favourable[$rows['act_id']]['time'] = sprintf($GLOBALS['_LANG']['promotion_time'], local_date('Y-m-d', $rows['start_time']), local_date('Y-m-d', $rows['end_time']));
                        $favourable[$rows['act_id']]['sort'] = $rows['start_time'];
                        $favourable[$rows['act_id']]['type'] = 'favourable';
                    }
                }
                elseif ($rows['act_range'] == FAR_GOODS)
                {
                    if (strpos(',' . $rows['act_range_ext'] . ',', ',' . $goods_id . ',') !== false)
                    {
                        $favourable[$rows['act_id']]['act_name'] = $rows['act_name'];
                        $favourable[$rows['act_id']]['url'] = 'activity.php';
                        $favourable[$rows['act_id']]['time'] = sprintf($GLOBALS['_LANG']['promotion_time'], local_date('Y-m-d', $rows['start_time']), local_date('Y-m-d', $rows['end_time']));
                        $favourable[$rows['act_id']]['sort'] = $rows['start_time'];
                        $favourable[$rows['act_id']]['type'] = 'favourable';
                    }
                }
            }
        }

        $sort_time = array();
        $arr = array_merge($snatch, $group, $auction, $package, $favourable);
        foreach($arr as $key => $value)
        {
            $sort_time[] = $value['sort'];
        }
        array_multisort($sort_time, SORT_NUMERIC, SORT_DESC, $arr);

        return $arr;
    }


    /**
     * 取得拍卖活动列表
     * @return  array
     */
    public function index_get_auction()
    {
        $now = gmtime();
        $limit = D('Template')->get_library_number('auction', 'index');

        $fields = array('a.act_id', 'a.goods_id', 'a.goods_name', 'a.ext_info', 'g.goods_thumb');
        $condition = array(
            'a.act_type' => C('GAT_AUCTION'),
            'a.is_finished' => 0,
            'a.start_time' => array('ELT',$now),
            'a.end_time' => array('EGT',$now),
            'g.is_delete' => 0,
        );

        $res = $this->fetchSql(false)->alias('a')->
        join('__GOODS__ g on g.goods_id = a.goods_id')->
        field($fields)->where($condition)->order('a.start_time DESC')->
        limit($limit)->select();

        $list = array();
        foreach($res as $key=>$row)
        {       
            $ext_info = unserialize($row['ext_info']);
            $arr = array_merge($row, $ext_info);
            $arr['formated_start_price'] = price_format($arr['start_price']);
            $arr['formated_end_price'] = price_format($arr['end_price']);
            $arr['thumb'] = get_image_path($row['goods_id'], $row['goods_thumb'], true);
            $arr['url'] = build_uri('auction', array('auid' => $arr['act_id']));
            $arr['short_name']   = $GLOBALS['_CFG']['goods_name_length'] > 0 ?
                                               sub_str($arr['goods_name'], $GLOBALS['_CFG']['goods_name_length']) : $arr['goods_name'];
            $arr['short_style_name']   = add_style($arr['short_name'],'');
            $list[] = $arr;
        }

        return $list;
    }


    /**
     * 获得最新的团购活动
     *
     * @return  array
     */
    public function index_get_group_buy()
    {
        $time = gmtime();
        $limit = D('Template')->get_library_number('group_buy', 'index');

        $group_buy_list = array();
        if ($limit > 0)
        {
            $fields = array(
                'gb.act_id' => 'group_buy_id',
                'gb.goods_id',
                'gb.ext_info', 
                'gb.goods_name', 
                'g.goods_thumb', 
                'g.goods_img',
            );
            $condition = array(
                'gb.act_type' => C('GAT_GROUP_BUY'),
                'gb.start_time' => array('ELT',$time),
                'gb.end_time' => array('EGT',$time),
                'g.is_delete' => 0,            
            );
            $res = $this->fetchSql(false)->alias('gb')->
            join('__GOODS__ g on g.goods_id = gb.goods_id')->
            field($fields)->where($condition)->order('gb.act_id DESC')->
            limit($limit)->select();
            
            foreach($res as $key=>$row)
            {
                /* 如果缩略图为空，使用默认图片 */
                $row['goods_img'] = get_image_path($row['goods_id'], $row['goods_img']);
                $row['thumb'] = get_image_path($row['goods_id'], $row['goods_thumb'], true);

                /* 根据价格阶梯，计算最低价 */
                $ext_info = unserialize($row['ext_info']);
                $price_ladder = $ext_info['price_ladder'];
                if (!is_array($price_ladder) || empty($price_ladder))
                {
                    $row['last_price'] = price_format(0);
                }
                else
                {
                    foreach ($price_ladder AS $amount_price)
                    {
                        $price_ladder[$amount_price['amount']] = $amount_price['price'];
                    }
                }
                ksort($price_ladder);
                $row['last_price'] = price_format(end($price_ladder));
                $row['url'] = build_uri('group_buy', array('gbid' => $row['group_buy_id']));
                $row['short_name']   = $GLOBALS['_CFG']['goods_name_length'] > 0 ?
                                               sub_str($row['goods_name'], $GLOBALS['_CFG']['goods_name_length']) : $row['goods_name'];
                $row['short_style_name']   = add_style($row['short_name'],'');
                $group_buy_list[] = $row;
            }
        }

        return $group_buy_list;
    }


    /**
     *  获取用户参与活动信息
     *
     * @param   int     $user_id        用户id
     *
     * @return  array
     */
    public function get_user_prompt ($user_id)
    {
        $prompt = array();

        /* 夺宝奇兵 */
        $res = $this->get_act_by_type('GAT_SNATCH');   
        // return $res;

        foreach ($res as $key=>$row)
        {
            $act_id = $row['act_id'];
            $result = $this->get_snatch_result($act_id);
            // return $result;
            if (isset($result['order_count']) && $result['order_count'] == 0 && $result['user_id'] == $user_id)
            {
                $prompt[] = array(
                       'text'=>sprintf(C('_LANG.your_snatch'),$row['goods_name'], $row['act_id']),
                       'add_time'=> $row['end_time']
                );
            }
            
            /**此处if条件不成立，很诡异的语句**
            if (isset($auction['last_bid']) && $auction['last_bid']['bid_user'] == $user_id && $auction['order_count'] == 0)
            {
                $prompt[] = array(
                    'text' => sprintf(C('_LANG.your_auction'), $row['goods_name'], $row['act_id']),
                    'add_time' => $row['end_time']
                );
            }*/
        }

        /* 竞拍 */
        $resu = $this->get_act_by_type('GAT_AUCTION');   
        // return $resu;   
        foreach ($resu as $ru_key=>$ru_row)
        {
            $act_id = $ru_row['act_id'];
            $auction = $this->auction_info($act_id);
            // return $auction;
            if (isset($auction['last_bid']) && $auction['last_bid']['bid_user'] == $user_id && $auction['order_count'] == 0)
            {
                $prompt[] = array(
                    'text' => sprintf(C('_LANG.your_auction'), $ru_row['goods_name'], $ru_row['act_id']),
                    'add_time' => $ru_row['end_time']
                );
            }
        }

        /* 排序 */
        $cmp = create_function('$a, $b', 'if($a["add_time"] == $b["add_time"]){return 0;};return $a["add_time"] < $b["add_time"] ? 1 : -1;');
        return $prompt;
        usort($prompt, $cmp);

        /* 格式化时间 */
        foreach ($prompt as $key => $val)
        {
            $prompt[$key]['formated_time'] = local_date(C('_CFG.time_format'), $val['add_time']);
        }

        return $prompt;
    }

     /**
     * 获取指定 id snatch 活动的结果
     *
     * @param   str   $type       GAT_SNATCH
     *
     * @return  array           array(user_name, bie_price, bid_time, num)
     *                          num通常为1，如果为2表示有2个用户取到最小值，但结果只返回最早出价用户。
     */
    protected function get_act_by_type($type = 'GAT_SNATCH'){
        $res = array();

        $now = gmtime();
        $fields = array('act_id', 'goods_name', 'end_time');
        $cond = array(
            'is_finished' => 0,
            'end_time' => array('ELT',$now),
        );
        $condit = array(
            'is_finished' => 1,
            '_complex' => $cond,
            '_logic' => 'OR',
        );

        $condition = array(
            'act_type' => C($type),
            '_complex' => $condit,
            '_logic' => 'AND',
        );
       
        $res = $this->fetchSql(false)->where($condition)->select();

        return $res;
    }

    /**
     * 获取指定 id snatch 活动的结果
     *
     * @param   int   $id       snatch_id
     *
     * @return  array           array(user_name, bie_price, bid_time, num)
     *                          num通常为1，如果为2表示有2个用户取到最小值，但结果只返回最早出价用户。
     */
    public function get_snatch_result($id)
    {
        $Users = $this->_users_model();
        $rec = $Users->get_user_snatch_by_id($id);
        
        if ($rec)
        {
            $rec['bid_time']  = local_date(C('_CFG.time_format'), $rec['bid_time']);
            $rec['formated_bid_price'] = price_format($rec['bid_price'], false);

            /* 活动信息 */           
            $info = $this->get_act_by_id($id);
           
            if (!empty($info['max_price']))
            {
                $rec['buy_price'] = ($rec['bid_price'] > $info['max_price']) ? $info['max_price'] : $rec['bid_price'];
            }
            else
            {
                $rec['buy_price'] = $rec['bid_price'];
            }

            /* 检查订单 */
            $OrderInfo = $this->_order_info_model();
            $rec['order_count'] = $OrderInfo->get_count_by_extensionid($id);           
        }

        return $rec;
    }

    protected function _users_model(){
        return new UsersModel();
    }
    protected function _order_info_model(){
        return new OrderInfoModel();
    }
    protected function _auction_log_model(){
        return new AuctionLogModel();
    }

    protected function get_act_by_id($id){
        $rec = array();

        $fields = array('ext_info');
        $condition = array(
            'act_id' => $id,
            'act_type' => C('GAT_SNATCH'),
        );
        $data = $this->field($fields)->where($condition)->find();

        $rec = unserialize($data['ext_info']);
        return $rec;
    }

     /**
     * 取得拍卖活动信息
     * @param   int     $act_id     活动id
     * @return  array
     */
    public function auction_info($act_id, $config = false)
    {           
        $auction = $this->where('act_id ='.$act_id)->find();
     
        if ($auction['act_type'] != C('GAT_AUCTION'))
        {
            return array();
        }
        $auction['status_no'] = $this->auction_status($auction);
        if ($config == true)
        {
            $auction['start_time'] = local_date('Y-m-d H:i', $auction['start_time']);
            $auction['end_time'] = local_date('Y-m-d H:i', $auction['end_time']);
        }
        else
        {
            $auction['start_time'] = local_date(C('_CFG.time_format'), $auction['start_time']);
            $auction['end_time'] = local_date(C('_CFG.time_format'), $auction['end_time']);
        }
        $ext_info = unserialize($auction['ext_info']);
        $auction = array_merge($auction, $ext_info);
        $auction['formated_start_price'] = price_format($auction['start_price']);
        $auction['formated_end_price'] = price_format($auction['end_price']);
        $auction['formated_amplitude'] = price_format($auction['amplitude']);
        $auction['formated_deposit'] = price_format($auction['deposit']);

        /* 查询出价用户数和最后出价 */        
        $AuctionLog = $this->_auction_log_model();
        $auction['bid_user_count'] = $AuctionLog->get_last_auc_count($act_id);

        if ($auction['bid_user_count'] > 0)
        {
           
            $row = $AuctionLog->get_last_auc_user($act_id);

            $row['formated_bid_price'] = price_format($row['bid_price'], false);
            $row['bid_time'] = local_date($GLOBALS['_CFG']['time_format'], $row['bid_time']);
            $auction['last_bid'] = $row;
        }

        /* 查询已确认订单数 */
        if ($auction['status_no'] > 1)
        {
            $OrderInfo = $this->_order_info_model();
            $order_count = $OrderInfo->get_count_by_extensionid($act_id,'auction');           
            $auction['order_count'] = $order_count;
        }
        else
        {
            $auction['order_count'] = 0;
        }

        /* 当前价 */
        $auction['current_price'] = isset($auction['last_bid']) ? $auction['last_bid']['bid_price'] : $auction['start_price'];
        $auction['formated_current_price'] = price_format($auction['current_price'], false);

        return $auction;
    }

     /**
     * 计算拍卖活动状态（注意参数一定是原始信息）
     * @param   array   $auction    拍卖活动原始信息
     * @return  int
     */
    protected function auction_status($auction)
    {
        $now = gmtime();
        if ($auction['is_finished'] == 0)
        {
            if ($now < $auction['start_time'])
            {
                return C('PRE_START'); // 未开始
            }
            elseif ($now > $auction['end_time'])
            {
                return C('FINISHED'); // 已结束，未处理
            }
            else
            {
                return C('UNDER_WAY'); // 进行中
            }
        }
        elseif ($auction['is_finished'] == 1)
        {
            return C('FINISHED'); // 已结束，未处理
        }
        else
        {
            return C('SETTLED'); // 已结束，已处理
        }
    }


}