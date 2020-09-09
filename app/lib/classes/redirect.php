<?php

namespace PHPMVC\LIB\CLASSES;

/**
 * Class Redirect
 * @author yourname
 */
class Redirect
{
    public static function to($location = null)
    {
        if($location){
            header('Location: '.$location);
            exit();
        }
    }

}
