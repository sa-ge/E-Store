<?php

if (!defined('DS')) {
    define('DS', DIRECTORY_SEPARATOR);
}


$GLOBALS['config']= array(
'mysql' => array(
    'host' => '127.0.0.1',
    'username' => 'root',
    'password' => '', 

    'db' => 'storedb',

      ),
'remember' => array(
    'cookie_name' => 'hash', 
    'cookie_expiry'=> 604800
        ),
'session' => array(
    'session_name' => 'user'
        )
);


