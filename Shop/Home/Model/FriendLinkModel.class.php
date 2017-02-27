<?php
namespace Home\Model;
use Think\Model;

class FriendLinkModel extends Model{

/**
 * 获得所有的友情链接
 *
 * @return  array
 */
public function index_get_links()
{
	$fields = array('link_logo', 'link_name', 'link_url');
	$res = $this->field($fields)->order('show_order')->select();
   
    $links['img'] = $links['txt'] = array();

    foreach ($res AS $row)
    {
        if (!empty($row['link_logo']))
        {
            $links['img'][] = array('name' => $row['link_name'],
                                    'url'  => $row['link_url'],
                                    'logo' => $row['link_logo']);
        }
        else
        {
            $links['txt'][] = array('name' => $row['link_name'],
                                    'url'  => $row['link_url']);
        }
    }

    return $links;
}
}