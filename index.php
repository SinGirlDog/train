<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2014 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 应用入口文件

// 检测PHP环境
if(version_compare(PHP_VERSION,'5.3.0','<'))  die('require PHP > 5.3.0 !');

// 开启调试模式 建议开发阶段开启 部署阶段注释或者设为false
define('APP_DEBUG',true);

// 定义应用目录
define('APP_PATH','./Application/');

//定义资源目录
define('SHOP_CSS_URL','/train/Shop/Home/Public/css/');
define('SHOP_IMG_URL','/train/Shop/Home/Public/image/');
define('SHOP_JS_URL','/train/Shop/Home/Public/js/');
define('SHOP_DATA_URL','/train/Shop/Home/Public/data/');
//定义资源目录
define('SHOPADM_CSS_URL','/train/Shop/Admin/Public/css/');
define('SHOPADM_IMG_URL','/train/Shop/Admin/Public/image/');
define('SHOPADM_JS_URL','/train/Shop/Admin/Public/js/');
define('SHOPADM_DAT_URL','/train/Shop/Admin/Public/dat/');

define('HTML_PATH', './Shop/HTML/');//生成静态页面的文件位置  

// 引入ThinkPHP入口文件
require './ThinkPHP/ThinkPHP.php';

// 亲^_^ 后面不需要任何代码了 就是如此简单