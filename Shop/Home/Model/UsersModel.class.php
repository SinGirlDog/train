<?php
namespace Home\Model;
use Think\Model;

class UsersModel extends Model{


	/* 是否需要同步数据到商城 */
    protected $need_sync = false;
   
    protected $cookie_domain = '';
    protected $cookie_path = '';

    // protected $cookie_domain = C('COOKIE_DOMAIN');
    // protected $cookie_path = C('COOKIE_PATH');

	/**
	 * 获取用户中心默认页面所需的数据
	 *
	 * @access  public
	 * @param   int         $user_id            用户ID
	 *
	 * @return  array       $info               默认页面所需资料数组
	 */
	function get_user_default($user_id=0)
	{
	    $user_bonus = $this->get_user_bonus();

	    $fields = array('pay_points', 'user_money', 'credit_line', 'last_login', 'is_validated');
	    $condition = array('user_id' => $user_id);
	   
	    $row = $this->field($fields)->where($condition)->select();

	    $info = array();
	    $info['username']  = stripslashes(session('user_name'));
	    $info['shop_name'] = C('_CFG.shop_name');
	    $info['integral']  = $row['pay_points'] . C('_CFG.integral_name');
	    /* 增加是否开启会员邮件验证开关 */
	    $info['is_validate'] = (C('_CFG.member_email_validate') && !$row['is_validated'])?0:1;
	    $info['credit_line'] = $row['credit_line'];
	    $info['formated_credit_line'] = price_format($info['credit_line'], false);

	    //如果$_SESSION中时间无效说明用户是第一次登录。取当前登录时间。
	    $last_time = !empty(session('last_time')) ? $row['last_login'] : session('last_time');

	    if ($last_time == 0)
	    {
	    	$last_time = gmtime();
	        session('last_time',$last_time);
	    }

	    $info['last_time'] = local_date(C('_CFG.time_format'), $last_time);
	    $info['surplus']   = price_format($row['user_money'], false);
	    $info['bonus']     = sprintf(C('_LANG.user_bonus_info'), $user_bonus['bonus_count'], price_format($user_bonus['bonus_value'], false));

	    $info['order_count'] = $this->get_order_count($user_id);

	    $info['shipped_order'] = $this->get_shipped_order($user_id,$last_time);
	   
	    return $info;
	}

	/**
	 *  获取用户信息数组
	 *
	 * @param
	 *
	 * @return array        $user       用户信息数组
	 */
	public function get_user_info($id=0){

		if ($id == 0){
	        $id = session('user_id');
	    }
	    $user = array();
	    if($id){

		    $fields = array('user_id','email','user_name','user_money','pay_points');
		    $condition = array('user_id'=>$id);

		   	$user = $this->field($fields)->where($condition)->find();	    
		    $bonus = $this->get_user_bonus($id);

		    $user['username']    = $user['user_name'];
		    $user['user_points'] = $user['pay_points'] . C('_CFG.integral_name');
		    $user['user_money']  = price_format($user['user_money'], false);
		    $user['user_bonus']  = price_format($bonus['bonus_value'], false);
		}
	    return $user;
	}
	/**
	 * 查询会员的红包金额
	 *
	 * @param   integer     $user_id
	 * @return  void
	 */
	public function get_user_bonus($user_id = 0)
	{
	    if ($user_id == 0){
	        $user_id = session('user_id');
	    }

	    $fields = array(
	    	'SUM(bt.type_money)' => 'bonus_value',
	    	'COUNT(*)' => 'bonus_count',
	    );
	    $condition = array(
	    	'ub.user_id' => $user_id,
	    	'ub.order_id' => '0',
	    );

	    $bonus = $this->table('sp_user_bonus')->alias('ub')->
	    join('__BONUS_TYPE__ bt on bt.type_id = ub.bonus_type_id')->
	    field($fields)->where($condition)->select();

	    return $bonus;
	}

	protected function get_order_count($user_id){

		$condition = array(
			'user_id' => $user_id,
			'add_time' => array('GT',local_strtotime('-1 months')),
		);
		$OrderInfo = $this->_order_info();

		$count = $OrderInfo->where($condition)->count();

		return $count;
		
	}

	protected function get_shipped_order($user_id,$last_time){
		$shipped_order = array();

		$fields = array('order_id', 'order_sn');
		$condition = array(
			'user_id' => $user_id,
			'shipping_time' => array('GT',$last_time),
		);

		$OrderInfo = $this->_order_info();
		$cond = $OrderInfo->count_condition_by_statu('shipped');

		$condition = array_merge($cond,$condition);
		
		$shipped_order = $OrderInfo->fetchSql(false)->field($fields)->where($condition)->select();

		return $shipped_order;
   
	}

	protected function _order_info(){
		return new \Admin\Model\OrderInfoModel();
	}

	public function get_user_snatch_by_id($id){
		$res = array();

		$fields = array('u.user_id', 'u.user_name', 'u.email', 'lg.bid_price', 'lg.bid_time', 
			'count(*)' => 'num');
		$condition = array(
			'lg.snatch_id' => $id,
		);
		$order = array('num ASC', 'lg.bid_price ASC', 'lg.bid_time ASC');
		
		$res = $this->alias('u')->join('LEFT JOIN __SNATCH_LOG__ lg on lg.user_id = u.user_id')->
		field($fields)->where($condition)->order($order)->find();
		return $res;
	}

	public function check_login($username,$password){
		// $this->set_session($username);		

		if ($this->check_user($username, $password) > 0){
            if ($this->need_sync){
                $this->sync($username,$password);
            }
            $this->set_session($username);
            $this->set_cookie($username, $remember);

            return true;
        }
        else{
            return false;
        }
	}

	public function do_logout(){
		$this->set_session();
	}

	protected function sync($username,$password){
		return ;
	}

	protected function set_session($username){
		
		if(empty($username)){
			//需要销毁session么
			session('user_id',null);
            session('user_name',null);
            session('email',null);
		}
		else{
			$fields = array('user_id', 'email');
			$cond = array('user_name'=>$username);

			$row = $this->fetchSql(false)->field($fields)->where($cond)->find();		

			if ($row){
	            session('user_id',$row['user_id']);
	            session('user_name',$username);
	            session('email',$row['email']);
	        }
		}		
	}

	protected function set_cookie($username='', $remember= null){

		if (empty($username)){
            /* 摧毁cookie */
            $time = time() - 3600;
            $options = array(
            	'time'=>$time,
            	'path'=>$this->cookie_path
            );
            cookie("ECS[user_id]", '', $options);            
            cookie("ECS[password]", '', $options);
        }
        elseif ($remember)
        {
            /* 设置cookie */
            $time = time() + 3600 * 24 * 15;
            $options = array(
            	'time'=>$time,
            	'path'=>$this->cookie_path,
            	'domain'=>$this->cookie_domain,
            );

            cookie("ECS[username]", $username, $options);

            $fields = array('user_id', 'password');
            $cond = array('user_name'=>$username);

            $row = $this->field($fields)->where($cond)->find();
            
            if ($row){
                cookie("ECS[user_id]", $row['user_id'], $options);
                cookie("ECS[password]", $row['password'], $options);
            }
        }
	}

	public function check_user($username,$password){

		$fields = array('user_id');
        $condition = array('user_name'=>$username);

        /* 如果没有定义密码则只检查用户名 */
	    if (!empty($password)){
			$condition['password'] = $this->compile_password(array('password'=>$password));
	    }
	    
        $res = $this->fetchSql(false)->field($fields)->where($condition)->getField();
        return $res;        
	}

	/**
     *  编译密码函数
     *
     * @param   array   $cfg 包含参数为 $password, $md5password, $salt, $type
     *
     * @return void
     */
    public function compile_password ($cfg)
    {
       if (isset($cfg['password']))
       {
            $cfg['md5password'] = md5($cfg['password']);
       }
       if (empty($cfg['type']))
       {
            $cfg['type'] = C('PWD_MD5');
       }

       switch ($cfg['type'])
       {
           case C('PWD_MD5') :
              	if(!empty($cfg['ec_salt']))
		       {
			       return md5($cfg['md5password'].$cfg['ec_salt']);
		       }
			   else
		       {
                    return $cfg['md5password'];
			   }

           case C('PWD_PRE_SALT') :
               if (empty($cfg['salt']))
               {
                    $cfg['salt'] = '';
               }

               return md5($cfg['salt'] . $cfg['md5password']);

           case C('PWD_SUF_SALT') :
               if (empty($cfg['salt']))
               {
                    $cfg['salt'] = '';
               }

               return md5($cfg['md5password'] . $cfg['salt']);

           default:
               return '';
       }
    }

}
