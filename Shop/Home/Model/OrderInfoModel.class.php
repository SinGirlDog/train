<?php
namespace Home\Model;
use Think\Model;

class OrderInfoModel extends Model{

	/**
 * 调用发货单查询
 *
 * @access  private
 * @return  array
 */
    public function index_get_invoice_query()
    {
    	$condition = array(
    		'invoice_no' => array('GT',''),
    		'shipping_status' => SS_SHIPPED,
    	);
    	$fields = array('order_sn','invoice_no','shipping_code');

    	$all = $this->alias('o')->field($fields)->join('__SHIPPING__ s on s.shipping_id = o.shipping_id')->where($condition)->order('shipping_time DESC')->limit(10)->select();

    	clearstatcache();

    	return $all;


        /*
        //某某快递插件-暂且搁置
        foreach ($all AS $key => $row)
        {
            $plugin = ROOT_PATH . 'includes/modules/shipping/' . $row['shipping_code'] . '.php';

            if (file_exists($plugin))
            {
                include_once($plugin);

                $shipping = new $row['shipping_code'];
                $all[$key]['invoice_no'] = $shipping->query((string)$row['invoice_no']);
            }
        }*/

        clearstatcache();

        return $all;
    }

   

}