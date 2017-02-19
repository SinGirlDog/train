<?php
namespace Shop\Model;
use Think\Model;

class ArticleModel extends Model{

/**
 * 获得最新的文章列表。
 *
 * @return  array
 */
public function index_get_new_articles()
{
	$fields = array('a.article_id', 'a.title', 'ac.cat_name',' a.add_time',' a.file_url', 'a.open_type', 'ac.cat_id', 'ac.cat_name' );
	$condition = array('a.is_open'=>1,'ac.cat_type' => 1);
	$limit_num = C('_CFG.article_number');
	
	$res = $this->fetchSql(false)->alias('a')->
	join('__ARTICLE_CAT__ ac on ac.cat_id=a.cat_id')->
	where($condition)->field($fields)->limit($limit_num)->
	order( 'a.article_type DESC', 'a.add_time DESC')->select();	
	
    $arr = array();
    $article_title_length = C('_CFG.article_title_length');   
    $date_format = C('_CFG.date_format');

    foreach ($res AS $idx => $row)
    {
        $arr[$idx]['id']          = $row['article_id'];
        $arr[$idx]['title']       = $row['title'];
        $arr[$idx]['short_title'] = $article_title_length > 0 ?
                                        sub_str($row['title'], $article_title_length) : $row['title'];
        $arr[$idx]['cat_name']    = $row['cat_name'];
        $arr[$idx]['add_time']    = local_date($date_format, $row['add_time']);
        $arr[$idx]['url']         = $row['open_type'] != 1 ?
                                        build_uri('article', array('aid' => $row['article_id']), $row['title']) : trim($row['file_url']);
        $arr[$idx]['cat_url']     = build_uri('article_cat', array('acid' => $row['cat_id']), $row['cat_name']);
    }

    return $arr;
}

}