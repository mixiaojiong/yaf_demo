<?php
class Comm_Tools{
    public static function Trace()
    {
        $args = func_get_args();
        header('content-type: text/html;charset=utf-8');
        echo "<pre>";
        foreach($args as $v) {
            print_r($v);
            echo "\n";
        }
        echo "</pre>";
        exit;
    }
}
