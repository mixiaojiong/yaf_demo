<?php

Class TestController extends Yaf_Controller_Abstract {
    public function indexAction() {
        // 如果是forward是在同一个http请求内的，还是上级Action的环境变量
        // 如果是redirect是新的http请求
        print_r($_GET);
        $from = $this->getRequest()->getParam("from");
        echo "this is TestController $from<br>";
    }
}
