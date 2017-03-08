<?php
namespace Home\Model;
use Think\Model;

class TagModel extends Model{

	public function get_user_tags($user_id){
		$tags = array();
		$tags = $this->get_tags(0,$user_id);
		if(!empty($tags)){
			$this->color_tag($tags);
		} 
		return $tags;
	}
	/**
	 * 获得指定用户、商品的所有标记
	 *
	 * @param   integer $goods_id
	 * @param   integer $user_id
	 * @return  array
	 */
	public function get_tags($goods_id = 0, $user_id = 0)
	{
		$fields = array('tag_id', 'user_id', 'tag_words', 'COUNT(tag_id)' => 'tag_count');
		$condition = array();

		if($goods_id){
			$condition['goods_id'] = $goods_id;
		}
		if($user_id){
			$condition['user_id'] = $user_id;
		}

		$arr = $this->field($fields)->where($condition)->group('tag_words')->select();
		return $arr;
	   
	}

	
	/**
	 * 标签着色
	 *
	 * @param    array
	 *
	 * @return   none
	 */
	protected function color_tag(&$tags)
	{
	    $tagmark = array(
	        array('color'=>'#666666','size'=>'0.8em','ifbold'=>1),
	        array('color'=>'#333333','size'=>'0.9em','ifbold'=>0),
	        array('color'=>'#006699','size'=>'1.0em','ifbold'=>1),
	        array('color'=>'#CC9900','size'=>'1.1em','ifbold'=>0),
	        array('color'=>'#666633','size'=>'1.2em','ifbold'=>1),
	        array('color'=>'#993300','size'=>'1.3em','ifbold'=>0),
	        array('color'=>'#669933','size'=>'1.4em','ifbold'=>1),
	        array('color'=>'#3366FF','size'=>'1.5em','ifbold'=>0),
	        array('color'=>'#197B30','size'=>'1.6em','ifbold'=>1),
	    );

	    $maxlevel = count($tagmark);
	    $tcount = $scount = array();

	    foreach($tags AS $val)
	    {
	        $tcount[] = $val['tag_count']; // 获得tag个数数组
	    }
	    $tcount = array_unique($tcount); // 去除相同个数的tag

	    sort($tcount); // 从小到大排序

	    $tempcount = count($tcount); // 真正的tag级数
	    $per = $maxlevel >= $tempcount ? 1 : $maxlevel / ($tempcount - 1);

	    foreach ($tcount AS $key => $val)
	    {
	        $lvl = floor($per * $key);
	        $scount[$val] = $lvl; // 计算不同个数的tag相对应的着色数组key
	    }

	    $rewrite = intval($GLOBALS['_CFG']['rewrite']) > 0;

	    /* 遍历所有标签，根据引用次数设定字体大小 */
	    foreach ($tags AS $key => $val)
	    {
	        $lvl = $scount[$val['tag_count']]; // 着色数组key

	        $tags[$key]['color'] = $tagmark[$lvl]['color'];
	        $tags[$key]['size']  = $tagmark[$lvl]['size'];
	        $tags[$key]['bold']  = $tagmark[$lvl]['ifbold'];
	        if ($rewrite)
	        {
	            if (strtolower(C('DEFAULT_CHARSET')) !== 'utf-8')
	            {
	                $tags[$key]['url'] = 'tag-' . urlencode(urlencode($val['tag_words'])) . '.html';
	            }
	            else
	            {
	                $tags[$key]['url'] = 'tag-' . urlencode($val['tag_words']) . '.html';
	            }
	        }
	        else
	        {
	            $tags[$key]['url'] = 'search.php?keywords=' . urlencode($val['tag_words']);
	        }
	    }
	    shuffle($tags);
	}

}
