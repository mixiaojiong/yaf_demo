<?php
require_once "vendor/autoload.php";

$hello = new Xiaojiong\Demo\Hello();
echo $hello->hello();

echo "\n";
$hiGirl = new Xiaojiong\Demo\Hello('My Goddess');
echo $hiGirl->hello();
