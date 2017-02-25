<?php
return array(
	//'配置项'=>'配置值'

	 /* 数据库设置 */
    'DB_TYPE'               =>  'mysql',     // 数据库类型
    'DB_HOST'               =>  'localhost', // 服务器地址
    'DB_NAME'               =>  'train_sp',          // 数据库名
    'DB_USER'               =>  'root',      // 用户名
    'DB_PWD'                =>  '',          // 密码
    'DB_PORT'               =>  '3306',        // 端口
    'DB_PREFIX'             =>  'sp_',    // 数据库表前缀
    'DB_PARAMS'          	=>  array(), // 数据库连接参数    
    'DB_DEBUG'  			=>  TRUE, // 数据库调试模式 开启后可以记录SQL日志
    'DB_FIELDS_CACHE'       =>  true,        // 启用字段缓存
    'DB_CHARSET'            =>  'utf8',      // 数据库编码默认采用utf8

    'URL_MODEL'             =>  2,       // URL访问模式,可选参数0、1、2、3,代表以下四种模式：

    'LAYOUT_ON'             =>  false, // 是否启用布局

    'TAGLIB_PRE_LOAD'       =>  'html',   // 需要额外加载的标签库(须指定标签库名称)以逗号分隔 

    'LOAD_EXT_FILE'         => 'basefuns,comfuns,timefuns',//自定义的共用库函数文件名

    'LOAD_EXT_CONFIG'       => 'const',//自定义常量文件

    'HTML_CACHE_ON'   => false,     // 开启静态缓存  
    'HTML_CACHE_TIME' => 604800,   // 全局静态缓存有效期（秒）(3600*24*7)  
    'HTML_FILE_SUFFIX'=> '.html',  // 设置静态缓存文件后缀  
    'HTML_CACHE_RULES'=> array(
         'Index:index'    =>array('{:controller}_{:action}'),  
    ),   // 定义静态缓存规则  
);