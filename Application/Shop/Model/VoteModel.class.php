<?php
namespace Shop\Model;
use Think\Model;

class VoteModel extends Model{


/**
 * 调用调查内容
 *
 * @param   integer $id   调查的编号
 * @return  array
 */
public function get_vote($id = '')
{
	$condition = array();
	$fields = array('vote_id', 'vote_name', 'can_multi', 'vote_count',);

	if(empty($id)){/* 随机取得一个调查的主题 */
		$time = gmtime();
		$condition['start_time'] = array('ELT',$time);
		$condition['end_time'] = array('EGT',$time);

		$fields['RAND()'] = 'rnd';

		$vote_arr = $this->where($condition)->field($fields)->order('rnd')->limit(1)->select();

	}
	else{
		$vote_arr = $this->field($fields)->find($id);
	}
       

    if ($vote_arr !== false && !empty($vote_arr))
    {
        /* 通过调查的ID,查询调查选项 */
        $opt_field = array();
        $res = $this->get_vote_options_by_id($vote_arr['vote_id']);
        
        /* 总票数 */       
        $option_num = $this->get_option_count($vote_arr['vote_id']);

        $arr = array();
        $count = 100;
        foreach ($res AS $idx => $row)
        {
            if ($option_num > 0 && $idx == count($res) - 1)
            {
                $percent = $count;
            }
            else
            {
                $percent = ($row['vote_count'] > 0 && $option_num > 0) ? round(($row['option_count'] / $option_num) * 100) : 0;

                $count -= $percent;
            }
            $arr[$row['vote_id']]['options'][$row['option_id']]['percent'] = $percent;

            $arr[$row['vote_id']]['vote_id']    = $row['vote_id'];
            $arr[$row['vote_id']]['vote_name']  = $row['vote_name'];
            $arr[$row['vote_id']]['can_multi']  = $row['can_multi'];
            $arr[$row['vote_id']]['vote_count'] = $row['vote_count'];

            $arr[$row['vote_id']]['options'][$row['option_id']]['option_id']    = $row['option_id'];
            $arr[$row['vote_id']]['options'][$row['option_id']]['option_name']  = $row['option_name'];
            $arr[$row['vote_id']]['options'][$row['option_id']]['option_count'] = $row['option_count'];
        }

        $vote_arr['vote_id'] = (!empty($vote_arr['vote_id'])) ? $vote_arr['vote_id'] : '';

        $vote = array('id' => $vote_arr['vote_id'], 'content' => $arr);

        return $vote;
    }
}

/* 通过调查的ID,查询调查选项 */
protected function get_vote_options_by_id($id = ''){
	$res = array();
	if($id){
		$res = $this->alias('v')->join('__VOTE_OPTION__ o on v.vote_id = o.vote_id')
		->where('o.voit_id = '.$id)->order('o.option_order ASC','o.option_id DESC')
		->field('v.*','o.option_id','o.vote_id','o.option_name','o.option_count')->select();
	}
	return $res;
}

/* 总票数 */
protected function get_option_count($id = ''){
	$condition = array('vote_id'=>$id);
	$fields = array('SUM(option_count)' => 'all_option');

	$option_num = $this->table('VoteOption')->where($coditon)->
	field($fields)->group('vote_id')->select();

	return $option_num;
}

}