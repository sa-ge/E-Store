<?php 

namespace PHPMVC;

if (!defined('DS')) 
{
    define('DS', DIRECTORY_SEPARATOR);
}
define('APP_PATH', realpath(dirname(__FILE__)));
define('VIEWS_PATH', APP_PATH.DS. 'views' . DS);
define('TEMPLATE_PATH', APP_PATH . DS . 'template'. DS);

defined('DATABASE_HOST_NAME')           ? null : define('DATABASE_HOST_NAME', '127.0.0.1');
defined('DATABASE_USER_NAME')           ? null : define('DATABASE_USER_NAME', 'root');
defined('DATABASE_PASSWORD')            ? null : define('DATABASE_PASSWORD', '');
defined('DATABASE_NAME')                ? null : define('DATABASE_NAME', 'storedb');
defined('DATABASE_PORT_NUMBER')         ? null : define('DATABASE_PORT_NUMBER', 3306);
defined('DATABASE_CONN_DRIVER')         ? NULL : define('DATABASE_CONN_DRIVER', 1);


 

