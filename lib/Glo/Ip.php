<?php

class Glo_Ip {
    public static function GetClientIp() {
        $uip = '';
        if(isset($_SERVER['HTTP_CLIENTIP']) && $_SERVER['HTTP_CLIENTIP'] && strcasecmp($_SERVER['HTTP_CLIENTIP'], 'unknown')) {
            $uip = $_SERVER['HTTP_CLIENTIP'];
        }
        else if(getenv('HTTP_X_FORWARDED_FOR') && strcasecmp(getenv('HTTP_X_FORWARDED_FOR'), 'unknown')) {
            $uip = getenv('HTTP_X_FORWARDED_FOR');
            strpos($uip, ',') && list($uip) = explode(',', $uip);
        } else if(getenv('HTTP_CLIENT_IP') && strcasecmp(getenv('HTTP_CLIENT_IP'), 'unknown')) {
            $uip = getenv('HTTP_CLIENT_IP');
        } else if(getenv('REMOTE_ADDR') && strcasecmp(getenv('REMOTE_ADDR'), 'unknown')) {
            $uip = getenv('REMOTE_ADDR');
        } else if(isset($_SERVER['REMOTE_ADDR']) && $_SERVER['REMOTE_ADDR'] && strcasecmp($_SERVER['REMOTE_ADDR'], 'unknown')) {
            $uip = $_SERVER['REMOTE_ADDR'];
        }
        return $uip;
    }
}
