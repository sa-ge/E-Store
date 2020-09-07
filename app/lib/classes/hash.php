<?php 


namespace PHPMVC\LIB\CLASSES;

// hash string with salt;

class Hash 
{
    public static function make($string , $salt = '')
    {
        return  password_hash($string,PASSWORD_BCRYPT,array("salt"=>$salt));
    }
    
    public static function salt($length)
    {
        return random_bytes($length);
    }

    public static function unique()
    {
        return self::make(uniqid());
    }
}
