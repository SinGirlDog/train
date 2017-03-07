<?php
namespace Admin\Controller;
use Think\Controller;

class IndexController extends Controller {
	
	function _initialize() {
		
		$this->_mergeConfig(); 	

		$this->admin = session('admin_data');

		$this->assign('send_mail_on',C('_CFG.send_mail_on'));
		
	}

    public function index(){

    	$AdminUser = D('AdminUser');
    	$nav_list = $AdminUser->get_nav_list();
    	$this->assign('nav_list',$nav_list);

    	$AdminMessage = D('AdminMessage');
    	$admin_msg = $AdminMessage->get_msg();
    	$this->assign('admin_msg',$admin_msg);    	

    	$OrderInfo = D('OrderInfo');
    	$order = $OrderInfo->order_count_all();
    	$this->assign('order',$order);   

    	$Goods = D('Goods');
    	$goods = $Goods->goods_admin_count('goods');
    	$this->assign('goods',$goods);   
    	$virtual_card = $Goods->goods_admin_count('virtual_card');
    	$this->assign('virtual_card',$virtual_card); 

    	$Stats = D('Stats');
    	$visit = $Stats->today_visit();  
    	$this->assign('today_visit',$visit); 
    	$this->assign('online_users','unknown'); 	

    	$Feedback = D('Feedback');
    	$feedback_number = $Feedback->feedback_number();    	
    	$this->assign('feedback_number',$feedback_number); 

    	$Comment = D('Comment');
    	$comment_number = $Comment->comment_number();    	
    	$this->assign('comment_number',$comment_number); 

    	$sys_info = $this->sys_info();
    	$this->assign('sys_info',$sys_info);
    	// echo '<pre/>';print_r($sys_info);die;

    	$this->fool_assign();
       	$this->display('adm:index');
    }

    public function fool_assign(){
    	$ad_list = C('_LANG.ad_list');
    	$download_ad_statistics = C('_LANG.download_ad_statistics');
    	$adsense_js_stats = C('_LANG.adsense_js_stats');

    	// $this->assign('action_link', array('href' => 'ads.php?act=list', 'text' => $ad_list));
    	// $this->assign('action_link2', array('href' => 'adsense.php?act=download', 'text' => $download_ad_statistics));
    	// $this->assign('ur_here',$adsense_js_stats);

    	$warning[] = C('_LANG.order_print_canntwrite');   
    	// $this->assign('warning_arr', $warning);
    }

    protected function _mergeConfig() {
		$_LANG = include ('./Shop/Common/Conf/lang_admin_config.php');
		$_lang_privilege = include ('./Shop/Common/Conf/lang_admin_privilege.php');
		$_lang_admin_index = include ('./Shop/Common/Conf/lang_admin_ind_config.php');
		$_LANG = array_merge($_LANG,$_lang_privilege,$_lang_admin_index);
		// echo '<pre/>'; print_r($_lang_privilege);die;
        C('_LANG',$_LANG);
      
		$this->assign('lang',$_LANG);	

		$MENUS = include('./Shop/Admin/Conf/menu_arr_config.php');
		$MENUS = $this->remake_menu($MENUS); 
		$this->assign('menus',$MENUS);
		// echo '<pre/>';print_r($MENUS);die;	

		D('Home/ShopConfig')->load_shop_config();
	}

	protected function remake_menu($menu_arr = array()){
		if(empty($menu_arr)){
			return array();
		}

		foreach ($menu_arr AS $key => $value)
	    {
	        ksort($menu_arr[$key]);
	    }
   		ksort($menu_arr);

	    foreach ($menu_arr AS $key => $val)
	    {
	        $menus[$key]['label'] = C('_LANG.'.$key);
	        if (is_array($val))
	        {
	            foreach ($val AS $k => $v)
	            {
	                if (isset($purview[$k]))
	                {
	                    if (is_array($purview[$k]))
	                    {
	                        $boole = false;
	                        foreach ($purview[$k] as $action)
	                        {
	                             $boole = $boole || admin_priv($action, '', false);
	                        }
	                        if (!$boole)
	                        {
	                            continue;
	                        }
	                    }
	                    else
	                    {
	                        if (! admin_priv($purview[$k], '', false))
	                        {
	                            continue;
	                        }
	                    }
	                }
	                if ($k == 'ucenter_setup' && C('_CFG.integrate_code') != 'ucenter')
	                {
	                    continue;
	                }
	                $menus[$key]['children'][$k]['label']  = C('_LANG.'.$k);
	                $menus[$key]['children'][$k]['action'] = $v;
	            }
	        }
	        else
	        {
	            $menus[$key]['action'] = $val;
	        }
	        
	        if(empty($menus[$key]['children']))
	        {
	            unset($menus[$key]);
	        }

	    }

	    return $menus;
	}

	protected function sys_info(){
		$sys_info = array();

		$sys_info['os']            = PHP_OS;
	    $sys_info['ip']            = I('server.SERVER_ADDR');
	    $sys_info['web_server']    = I('server.SERVER_SOFTWARE');
	    $sys_info['php_ver']       = PHP_VERSION;
	    $sys_info['mysql_ver']     = $this->_mysql_version();
	    $sys_info['zlib']          = function_exists('gzclose') ? C('_LANG.yes'):C('_LANG.no');
	    $sys_info['safe_mode']     = (boolean) ini_get('safe_mode') ?  C('_LANG.yes'):C('_LANG.no');
	    $sys_info['safe_mode_gid'] = (boolean) ini_get('safe_mode_gid') ? C('_LANG.yes'):C('_LANG.no');
	    $sys_info['timezone']      = function_exists("date_default_timezone_get") ? date_default_timezone_get() : C('_LANG.no_timezone');
	    $sys_info['socket']        = function_exists('fsockopen') ? C('_LANG.yes'):C('_LANG.no');

	    $gd = gd_version();

	    if ($gd == 0)
	    {
	        $sys_info['gd'] = 'N/A';
	    }
	    else
	    {
	        if ($gd == 1)
	        {
	            $sys_info['gd'] = 'GD1';
	        }
	        else
	        {
	            $sys_info['gd'] = 'GD2';
	        }

	        $sys_info['gd'] .= ' (';

	        if ($gd && (imagetypes() & IMG_JPG) > 0)
	        {
	            $sys_info['gd'] .= ' JPEG';
	        }

	        if ($gd && (imagetypes() & IMG_GIF) > 0)
	        {
	            $sys_info['gd'] .= ' GIF';
	        }

	        if ($gd && (imagetypes() & IMG_PNG) > 0)
	        {
	            $sys_info['gd'] .= ' PNG';
	        }

	        $sys_info['gd'] .= ')';
	    }

	    
	    // $sys_info['ip_version'] = ecs_geoip('255.255.255.0');
	     $sys_info['ip_version'] = $this->ip_location();
	    
	    $sys_info['max_filesize'] = ini_get('upload_max_filesize');

	    return $sys_info;
	}

	protected function ip_location(){
		//import('ORG.Net.IpLocation');// 导入IpLocation类
		$Ip = new \Org\Net\IpLocation(); // 实例化类 参数表示IP地址库文件
		$area = $Ip->getlocation(); // 获取某个IP地址所在的位置
	}

	protected function _mysql_version(){
		$Model = self::_model();
        $version = $Model->query("select version() as ver");
        return $version[0]['ver'];
	}

	protected function _model(){
        return new \Think\Model();
    }
}