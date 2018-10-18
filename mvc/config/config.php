<?php

// 数据库配置

define('DB_NAME', 'project');

define('DB_USER', 'root');

define('DB_PASSWORD', 'root');

define('DB_HOST', 'localhost');

$config  = array(

	// 默认控制器和操作名
	'defaultController'=>'Index',
	'defaultAction'=>'show',
	// 数据库配置信息
	'db' =>array(
			'db_name' => 'project', 
			'db_user' => 'root', 
			'db_pwd' => 'root', 
			'db_host' => '127.0.0.1', 
 	),
 	// session存储方式、默认是files存储
 	'session'=>array(
 		'files' =>array() , 
 		'memcache'=>array(
 			'path'=>'tcp://127.0.0.1:11211',
 			'handler'=>'memcache'
 		),
 		'target'=>'memcache'
 	),
 	// 路由访问方式:fullPath 全路径、simplePath 简单路径(默认简单路径)
 	'route'=>array(
 		'target'=>'simplePath'
 	)
);
return $config;