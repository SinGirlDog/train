<?php
namespace Shop\Model;
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
	$str = sprintf($GLOBALS['_LANG']['cart_info'], $number, $amount);
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

}