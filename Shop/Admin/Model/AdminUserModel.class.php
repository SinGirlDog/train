<?php
namespace Admin\Model;
use Think\Model;

/**
* 
*/
class AdminUserModel extends Model{
	
	public function login_check($username,$password){
		$salt = $this->get_salt($username);

		$pw_md = md5($password);
		if($sqlt){
			$pw_md = md5($pw_md.$salt);
		}
		
		$fields = array('user_id, user_name', 'password', 'last_login', 'action_list',' last_login','suppliers_id','ec_salt');
		$condition = array(
			'user_name' => $username,
			'password' => $pw_md,
		);

		$data = $this->field($fields)->wHere($condition)->find();

		if($data){
			session('admin_data',$data);
			$this->update_login($data['user_id']);
			return true;
		}
		else{
			return false;
		}		
	}

	protected function get_salt($username){
		$fields = array('ec_salt');
		$cond = array('user_name' => $username);
		$salt = $this->field($fields)->where($cond)->find();

		return $salt;
	}

	protected function update_login($user_id){
		$data = array(
			'last_time' => gmtime(),
			'last_id' => real_ip(),
		);
		$cond=array('user_id' => $user_id);
		$this->where($cond)->data($data)->save();
	}

	public function get_nav_list(){
		$admin_data = session('admin_data');
		if(!$admin_data['user_id']){
			return false;
		}
		$condition['user_id'] = $admin_data['user_id'];
		$fields = array('nav_list');

		$nav_str = $this->fetchSql(false)->field($fields)->where($condition)->find();
		if(!empty($nav_str)){
			$nav_data = explode(',',$nav_str['nav_list']);
			foreach($nav_data as $nav_one){
				$tem = explode('|',$nav_one);
				$nav_list[$tem[1]] = $tem[0];
			}				
		}
		return $nav_list;
	}
	

}