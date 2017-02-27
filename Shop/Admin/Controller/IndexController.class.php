<?php
namespace Admin\Controller;
use Think\Controller;

class IndexController extends Controller {
	
	function _initialize() {
		
		$this->_mergeConfig(); 		
	}

    public function index(){
    	// echo 'hellow I M SHOPADMIN';
       $this->display('adm:index');
    }

    protected function _mergeConfig() {
		$_LANG = include ('./Shop/Common/Conf/lang_admin_config.php');
		$_lang_privilege = include ('./Shop/Admin/Conf/privilege.php');
		$_LANG = array_merge($_LANG,$_lang_privilege);
		// echo '<pre/>'; print_r($_lang_privilege);die;
        C('_LANG',$_LANG);
      
		$this->assign('lang',$_LANG);
	}
}