<?php

class UserModel {
    public function getUserInfo() {
        return array(
            "uid" => 968,
            "uname" => "xiaojiong",
        );
    }
    public function getError() {
        throw new Yaf_Exception('yaf exception');
    }
}
