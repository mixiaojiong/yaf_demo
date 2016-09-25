<?php

class IndexController extends Yaf_Controller_Abstract {

    public function IndexAction() {
        echo "我是admin modules下的index Controller的 index方法";
    }
    // admin 模块读取UserModel
    public function getUserInfoAction() {
        // 这里会去寻找application/models/User.php
        // 而不是去寻找application/Modules/admin/models/User.php
        $userModel = new UserModel();
        $userInfo = $userModel->getUserInfo();
        Comm_Tools::Trace($userInfo);
    }

}
