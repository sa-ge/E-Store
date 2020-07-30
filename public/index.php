<?php
namespace PHPMVC;
session_start();


if (!defined('DS'))
{
    define('DS', DIRECTORY_SEPARATOR);
}
use PHPMVC\LIB\FrontController;

require_once('..'. DS .'app'.DS.'config.php');
require_once(APP_PATH . DS.'lib' .DS.'database' . DS .  'init.php');
require_once(APP_PATH . DS .'lib' . DS . 'autoload.php');
$FrontController = new FrontController();
$FrontController->dispatch();



