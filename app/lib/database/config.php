<?php

namespace PHPMVC\LIB\DATABASE;
class Config {
    public static function get($path = null)
    {

        if ($path){
            $config = $GLOBALS['config'];
            $path = explode(DS,$path);
            foreach($path as $bit){
                if(isset($config[$bit])){
                    $config= $config[$bit];
                }
            }
            return $config;
        
        }
        return false;
    }
}

require_once (APP_PATH .DS. 'lib'.DS.'functions'.DS.'sanitize.php');