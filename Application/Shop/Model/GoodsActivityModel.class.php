<?php
namespace Shop\Model;
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

}