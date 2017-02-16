<?php
return array(
	//'配置项'=>'配置值'

	 /* 数据库设置 */
    'DB_TYPE'               =>  'mysql',     // 数据库类型
    'DB_HOST'               =>  'localhost', // 服务器地址
    'DB_NAME'               =>  'train_tp',          // 数据库名
    'DB_USER'               =>  'root',      // 用户名
    'DB_PWD'                =>  '',          // 密码
    'DB_PORT'               =>  '3306',        // 端口
    'DB_PREFIX'             =>  'tp_',    // 数据库表前缀
    'DB_PARAMS'          	=>  array(), // 数据库连接参数    
    'DB_DEBUG'  			=>  TRUE, // 数据库调试模式 开启后可以记录SQL日志
    'DB_FIELDS_CACHE'       =>  true,        // 启用字段缓存
    'DB_CHARSET'            =>  'utf8',      // 数据库编码默认采用utf8
    //Memcache
    'DATA_CACHE_TYPE' => 'memcache',//缓存方式
    'MEMCACHE_HOST' => 'tcp://127.0.0.1:11211',// 缓存服务器地址
    'DATA_CACHE_TIME' => '3600',//指定默认的缓存时长为3600 秒,没有会出错

    'URL_MODEL'             =>  1,       // URL访问模式,可选参数0、1、2、3,代表以下四种模式：

    
    // 'DATA_CACHE_PREFIX' => 'Redis_',//缓存前缀
    // 'DATA_CACHE_TYPE'=>'Redis',//默认动态缓存为Redis
    // 'REDIS_RW_SEPARATE' => false, //Redis读写分离 true 开启
    // 'REDIS_HOST'=>'127.0.0.1', //redis服务器ip，多台用逗号隔开；读写分离开启时，第一台负责写，其它[随机]负责读；
    // 'REDIS_PORT'=>'6379',//端口号
    // 'REDIS_TIMEOUT'=>'300',//超时时间
    // 'REDIS_PERSISTENT'=>false,//是否长连接 false=短连接
    // 'REDIS_AUTH'=>'test123',//AUTH认证密码
    // 'DATA_CACHE_TIME'       => 10800,      // 数据缓存有效期 0表示永久缓存
   
);