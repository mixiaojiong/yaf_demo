<?php
define("APP_NAME", "demo");
// 定义应用目录
define("APP_PATH",  dirname(dirname(__FILE__)));
// 初始化应用
$app  = new Yaf_Application(APP_PATH . "/conf/demo.ini");
$app->bootstrap()->run();
