<?php
try {
    date_default_timezone_set('Asia/Shanghai');
    define("APP_NAME", 'demo');
    define("APP_PATH",  dirname(dirname(__FILE__)));
    $app  = new Yaf_Application(APP_PATH . "/conf/demo.ini");
    $app->bootstrap()->execute("main", $argc, $argv);
} catch (Exception $e) {
    print_r($e);
}
