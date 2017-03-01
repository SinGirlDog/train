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

    public function order_count_all(){
        return $this->order_count_by_statu();
    }

    protected function order_count_by_statu($statu = 'await_ship'){

        $os_confirmed = C('OS_CONFIRMED');
        $os_splited = C('OS_SPLITED');
        $os_spliting_part = C('OS_SPLITING_PART');  

        $ss_shipped = C('SS_SHIPPED');
        $ss_received = C('SS_RECEIVED');
        $ss_unshipped = C('SS_UNSHIPPED');
        $ss_preparing = C('SS_PREPARING');
        $ss_shipped_ing = C('SS_SHIPPED_ING');

        $ps_paying = C('PS_PAYING');
        $ps_payed = C('PS_PAYED');

        $condition = array();
        switch($statu){
            case 'finished':
                $condition = array(
                    'order_status' => array('IN',array($os_confirmed,$os_splited)),
                    'shipping_status' => array('IN',array($ss_shipped,$ss_received)),
                    'pay_status' => array('IN',array($ps_paying,$ps_payed)),
                );
         
            break;
            case 'await_ship':                
                $cond = array(
                    'pay_status' => array('IN',array($ps_paying,$ps_payed)),
                    'pay_id' => array('IN',array($x,$y,$z)),
                    '_logic' => 'OR',
                );
                $condition = array(
                    'order_status' => array('IN',array($os_confirmed,$os_splited,$os_spliting_part)),
                    'shipping_status' => array('IN',array($ss_unshipped,$ss_preparing,$ss_shipped_ing)),
                    '_complex' => $cond,
                    '_logic' => 'AND',                   
                );
                 

             // return " AND   {$alias}order_status " .
             //     db_create_in(array(OS_CONFIRMED, OS_SPLITED, OS_SPLITING_PART)) .
             //   " AND   {$alias}shipping_status " .
             //     db_create_in(array(SS_UNSHIPPED, SS_PREPARING, SS_SHIPPED_ING)) .
             //   " AND ( {$alias}pay_status " . db_create_in(array(PS_PAYED, PS_PAYING)) . " OR {$alias}pay_id " . db_create_in(payment_id_list(true)) . ") ";

            break;
            case 'await_pay':
            break;
            case 'unconfirmed':
            break;
            case 'unprocessed':
            break;
            case 'unpay_unship':
            break;
            case 'shipped':
            break;
            default:
            break;
        }

        $count = $this->fetchSql(false)->where($condition)->count();
        return $count;
    }

}