<?php
namespace Home\Model;
use Think\Model;

class UserRankModel extends Model{
	
	/**
	 * 取得用户等级信息
	 * @return array
	 */
	public function get_rank_info()
	{
		$rank_id = session('user_rank_id');//有些混淆session里存的应该是id
		$data = array();
	    if (!empty($rank_id)){
	    	
	       	$data = $this->get_current_rank($rank_id);
	       	if(!empty($data) && empty($data['special_rank'])){	       		
       		
	            $user_rank = $this->get_current_rank_points();
	            $next_rank_data = $this->get_next_rank($user_rank);

	            $data = array_merge($data,$next_rank_data);		        
	       	}
	    }
	    return $data;
	}

	protected function _users_model(){
		return new UsersModel();
	}

	protected function get_current_rank($rank_id){
		$row = array();
		$fields = array('rank_name','special_rank');
	    $cond = array('rank_id'=>$rank_id);
	    $row = $this->field($fields)->where($cond)->find();
	    return $row;
	}

	protected function get_current_rank_points(){    	
    	$Users = $this->_users_model();
		$user_id = session('user_id');
    	$cond = array('user_id' => $user_id);
    	$row = $Users->field('rank_points')->where($cond)->find();    	
    	return $row['rank_points'];
	}

	protected function get_next_rank($user_rank){
		$next_data = array();
		$fields = array('rank_name'=>'next_rank_name','min_points');	           
    	$cond = array('min_points'=>array('GT',$user_rank));
       	$next_data = $this->field($fields)->where($cond)->order('min_points ASC')->find();
       	$next_data['next_rank'] = $next_data['min_points'] - $user_rank;
       	return $next_data;
	}
}