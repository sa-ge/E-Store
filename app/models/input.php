<?php

namespace PHPMVC\MODELS;

/**
 * Class input
 * @author sage
 */
 class Input
{
    // Checking the type of request and if the request empty or no
    public static function exists($type = 'post')
    {
        switch ($type) {
            case 'post':
               return (!empty($_POST))? true : false;
                break;
            case 'get':
               return (!empty($_GET))? true : false;
                break;
            default:
               return false;
                break;
        }

    }
       // getting values from the request
    public static function get($item)
    {
        if(isset($_POST[$item])){
            return $_POST[$item];
        }else if(isset($_GET[$item])){
            return $_GET[$item];
        }
        return '';
    }
}

