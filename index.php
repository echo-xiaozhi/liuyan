<?php
//入口文件

//检测php环境
if (version_compare(PHP_VERSION,'5.3.0','<')) die('require PHP > 5.3.0 !');

//调试模式
define('APP_DEBUG',true);

//定义应用目录
define('APP_PATH','./Msg/');

//引用核心文件
require 'ThinkPHP/ThinkPHP.php';