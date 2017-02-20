<?php
namespace Shop\Model;
use Think\Model;

class BrandModel extends Model{

/**
 * 取得品牌列表
 * @return array 品牌列表 id => name
 */
public function get_brand_list()
{
	$fields = array('brand_id', 'brand_name');
	$res = $this->field($fields)->order('sort_order')->select();
   
    $brand_list = array();
    foreach ($res AS $row)
    {
        $brand_list[$row['brand_id']] = addslashes($row['brand_name']);
    }

    return $brand_list;
}


/**
 * 获得某个分类下
 *
 * @param   int     $cat
 * @return  array
 */
public function get_brands($cat = 0, $app = 'brand')
{
	$fields = array(
		'b.brand_id',
	 	'b.brand_name',
	 	'b.brand_logo',
	 	'b.brand_desc',
		'COUNT(*)' => 'goods_num',
		'IF(b.brand_logo > "", 1, 0)' => 'tag',
	);
	$condition = array(
		'is_show' => 1,
		'g.is_on_sale' => 1,
		'g.is_alone_sale' => 1,
		'g.is_delete' => 0,
	);
	$order = array('tag DESC', 'b.sort_order ASC');
	//$children = ($cat > 0) ? ' AND ' . get_children($cat) : '';
	$children = '';
	$num = D('Template')->get_library_number("brands");

	$row = $this->fetchSql(false)->alias('b')->
	join('__GOODS__ g on g.brand_id = b.brand_id')->
	field($fields)->where($condition)->
	group('b.brand_id')->having('goods_num > 0')->limit($num)->select();

	foreach ($row AS $key => $val)
    {
        $row[$key]['url'] = build_uri($app, array('cid' => $cat, 'bid' => $val['brand_id']), $val['brand_name']);
        $row[$key]['brand_desc'] = htmlspecialchars($val['brand_desc'],ENT_QUOTES);
    }

	return $row;

   /* global $page_libs;
    $template = basename(PHP_SELF);
    $template = substr($template, 0, strrpos($template, '.'));
    include_once(ROOT_PATH . ADMIN_PATH . '/includes/lib_template.php');
    static $static_page_libs = null;
    if ($static_page_libs == null)
    {
            $static_page_libs = $page_libs;
    }

    $children = ($cat > 0) ? ' AND ' . get_children($cat) : '';

    $sql = "SELECT b.brand_id, b.brand_name, b.brand_logo, b.brand_desc, COUNT(*) AS goods_num, IF(b.brand_logo > '', '1', '0') AS tag ".
            "FROM " . $GLOBALS['ecs']->table('brand') . "AS b, ".
                $GLOBALS['ecs']->table('goods') . " AS g ".
            "WHERE g.brand_id = b.brand_id $children AND is_show = 1 " .
            " AND g.is_on_sale = 1 AND g.is_alone_sale = 1 AND g.is_delete = 0 ".
            "GROUP BY b.brand_id HAVING goods_num > 0 ORDER BY tag DESC, b.sort_order ASC";
    if (isset($static_page_libs[$template]['/library/brands.lbi']))
    {
        $num = get_library_number("brands");
        $sql .= " LIMIT $num ";
    }
    $row = $GLOBALS['db']->getAll($sql);

    foreach ($row AS $key => $val)
    {
        $row[$key]['url'] = build_uri($app, array('cid' => $cat, 'bid' => $val['brand_id']), $val['brand_name']);
        $row[$key]['brand_desc'] = htmlspecialchars($val['brand_desc'],ENT_QUOTES);
    }

    return $row;*/
}

}