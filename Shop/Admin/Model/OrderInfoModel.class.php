<?php
namespace Admin\Model;
use Think\Model;

class OrderInfoModel extends Model{

	 //admin首页start列表统计数组
    public function order_count_all(){
        $order = array();
        $status_arr = array(
            'finished',
            'await_ship',
            'await_pay',
            'unconfirmed',
            'unprocessed',
            'unpay_unship',
            'shipped',
            'shipped_part',           
        );
        foreach($status_arr as $sta){
            $order[$sta] = $this->order_count_by_statu($sta);
        }
               
        $order['stats'] = $this->order_stats();
        $order['booking_goods'] =$this->order_booking_goods();
        $order['new_repay'] = $this->order_new_repay();

        return $order;
    }

    protected function order_stats(){
        $fields  = array(
            'COUNT(*)' => 'oCount',
            'IFNULL(SUM(order_amount), 0)' => 'oAmount',
        );
        $stats = $this->field($fields)->find();

        return $stats;
    }

    protected function order_booking_goods(){
        $condition  = array(
            'is_dispose' => 0
            
        );
        $booking_goods = $this->table('sp_booking_goods')->where($condition)->count();

        return $booking_goods;
    }

    protected function order_new_repay(){
        $surplus_return = C('SURPLUS_RETURN');
        $condition  = array(
            'is_paid' => 0,
            'process_type' => $surplus_return,
        );
        $new_repay = $this->table('sp_user_account')->where($condition)->count();
        
        return $new_repay;
    }

    protected function order_count_by_statu($statu = 'await_ship'){

        $os_confirmed = C('OS_CONFIRMED');
        $os_unconfirmed = C('OS_UNCONFIRMED'); 
        $os_splited = C('OS_SPLITED');
        $os_spliting_part = C('OS_SPLITING_PART');          

        $ss_shipped = C('SS_SHIPPED');
        $ss_received = C('SS_RECEIVED');
        $ss_unshipped = C('SS_UNSHIPPED');
        $ss_preparing = C('SS_PREPARING');
        $ss_shipped_ing = C('SS_SHIPPED_ING');
        $ss_shipped_part = C('SS_SHIPPED_PART');

        $ps_paying = C('PS_PAYING');
        $ps_payed = C('PS_PAYED');
        $ps_unpayed = C('PS_UNPAYED');

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
                    'pay_id' => array('IN',$this->payment_id_list(1)),
                    '_logic' => 'OR',
                );
                $condition = array(
                    'order_status' => array('IN',array($os_confirmed,$os_splited,$os_spliting_part)),
                    'shipping_status' => array('IN',array($ss_unshipped,$ss_preparing,$ss_shipped_ing)),
                    '_complex' => $cond,
                    '_logic' => 'AND',                   
                );  
            break;
            case 'await_pay':
                $cond = array(
                    'shipping_status' => array('IN',array($ss_shipped,$ss_received)),
                    'pay_id' => array('IN',$this->payment_id_list(0)),
                    '_logic' => 'OR',
                );
                $condition = array(
                    'order_status' => array('IN',array($os_confirmed,$os_splited)),
                    'pay_status' => $ps_unpayed,
                    '_complex' => $cond,
                    '_logic' => 'and',
                );
            break;
            case 'unconfirmed':
                $condition = array(
                    'order_status' => $os_unconfirmed,
                );  
            break;
            case 'unprocessed':
                $condition = array(
                    'order_status' => array('IN',array($os_confirmed,$os_unconfirmed)),
                    'shipping_status' => $ss_unshipped,
                    'pay_status' => $ps_unpayed,
                );  
            break;
            case 'unpay_unship':
                $condition = array(
                    'order_status' => array('IN',array($os_confirmed,$os_unconfirmed)),
                    'shipping_status' => array('IN',array($ss_unshipped,$ss_preparing)),
                    'pay_status' => $ps_unpayed,
                );  
            break;
            case 'shipped':
                $condition = array(
                    'order_status' => $os_confirmed,
                    'shipping_status' => array('IN',array($ss_shipped,$ss_received)),
                );  
            break;
            case 'shipped_part':
                $condition = array(
                    'shipping_status' => $ss_shipped_part,
                );
            break;
            default:
            break;
        }

        $count = $this->fetchSql(false)->where($condition)->count();
        return $count;
    }

    /**
     * 取得支付方式id列表
     * @param   $is_cod 是否货到付款
     * @return  array
     */
    protected function payment_id_list($is_cod)
    {
        $pay_arr = array();       
        $condition = array();
        if ($is_cod){
            $condition = array('is_cod' => 1);
        }
        else{
            $condition = array('is_cod' => 0);
        }

        $pay_arr = $this->fetchSql(false)->table('sp_payment')->
        where($condition)->getField('pay_id',true);         

        return $pay_arr;
    }
    
}