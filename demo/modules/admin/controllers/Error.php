<?php
class ErrorController extends Yaf_Controller_Abstract {

    public function errorAction($exception) {
        $constArr = array(
            YAF_ERR_NOTFOUND_MODULE,
            YAF_ERR_NOTFOUND_CONTROLLER,
            YAF_ERR_DISPATCH_FAILED,
            YAF_ERR_NOTFOUND_ACTION,
            YAF_ERR_NOTFOUND_VIEW
        );
        $err = $exception->getCode();
        if (in_array($err, $constArr)) {
            $code = 404;
            $message = '请求的页面不存在';
        } else {
            $code = 500;
            $message = '服务器在偷懒';
        }
        if (ini_get("yaf.environ") == 'dev') {
            $message = $exception->getMessage();
        }
        echo $message;exit;
    }
    public function sorryAction() {
        echo "您走错了吧？";
        exit;
    }
}

