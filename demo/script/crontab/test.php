<?php
require(dirname(dirname(__FILE__)) . '/init.php');
$app->bootstrap()->execute("main", $argc, $argv);
function main($argc, $argv)
{
    $userModel = new UserModel();
    $userInfo = $userModel->getUserInfo();
    print_r($userInfo);
}

