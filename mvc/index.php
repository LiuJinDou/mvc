<?php
// 应用目录为当前目录

define('APP_PATH', __DIR__ . '/');

// 开启调试模式

define('APP_DEBUG', true);

// 加载框架文件

require(APP_PATH . 'vendor/Fastphp.php');

// 加载配置文件

$config = require(APP_PATH . 'config/config.php');

// 实例化框架类

(new Fastphp($config))->run();


// error_reporting(E_ALL);
// ini_set('display_errors', "OFF");
// ini_set('error_log','./log.txt');
// echo aaaaa;



