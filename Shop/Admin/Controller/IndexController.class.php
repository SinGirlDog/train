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

    	$OrderInfo = D('Home/OrderInfo');
    	$order = $OrderInfo->order_count_all();
    	// echo '<pre/>';print_r($order);die;

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
}