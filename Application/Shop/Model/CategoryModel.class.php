<?php
namespace Shop\Model;
use Think\Model;

class CategoryModel extends Model{



/**
 * 获得指定分类同级的所有分类以及该分类下的子分类
 *
 * @param   integer     $cat_id     分类编号
 * @return  array
 */
public function get_categories_tree($cat_id = 0)
{
	ini_set('memory_limit','-1');
    if ($cat_id > 0)
    {
        $cond = array(
            'cat_id' => $cat_id,
            );
        $parent_id = $this->where($cond)->find('parent_id');
    }
    else
    {
        $parent_id = 0;
    }

    /*
     判断当前分类中全是是否是底级分类，
     如果是取出底级分类上级分类，
     如果不是取当前分类及其下的子分类
    */
     $cat_arr = array();
     $cat_arr = $this->get_child_tree($parent_id);
          
     if(isset($cat_arr))
    {
        return $cat_arr;
    }
}

public function get_child_tree($tree_id = 0)
{
	ini_set('memory_limit','-1');
	set_time_limit(0);
    $cat_arr = array();
    $cond = array(
    	'parent_id' => $tree_id,
    	'is_show' => 1,
    );
    $count = $this->where($cond)->count();

    if($count || $tree_id == 0){
    	$fields = array('cat_id','cat_name','parent_id','is_show');

    	$cats_arr = $this->field($fields)->where($cond)->order('sort_order ASC','cat_id ASC')->select();    	
    	foreach($cats_arr as $key=>$row) {
     		if($row['is_show']) {

     			$cat_arr[$row['cat_id']]['id']   = $row['cat_id'];
                $cat_arr[$row['cat_id']]['name'] = $row['cat_name'];
                $cat_arr[$row['cat_id']]['url']  = build_uri('category', array('cid' => $row['cat_id']), $row['cat_name']);
     		}
     		if (isset($row['cat_id']) != NULL)
            {
                $cat_arr[$row['cat_id']]['cat_id'] = $this->get_child_tree($row['cat_id']);
            }
     	}
    }
    
    return $cat_arr;
}


}
