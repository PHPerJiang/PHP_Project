<?php
header('content-type:text/html;charset=utf-8');//设置页面编码
session_start();//打开session
require_once 'framework/function/function.php';//引入funtion方法
date_default_timezone_set('Asia/Shanghai');//设置默认时间为上海时间
require_once 'config.php';
require_once 'framework/PC.php';
PC::run($config);