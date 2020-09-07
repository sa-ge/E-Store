<?php 

namespace PHPMVC\LIB\CLASSES;



class Session
{
    public static function exists($name)
    {
        if((isset($_SESSION[$name])))
        {
            return true;
        }
            return false;
    }

    public static function put($name , $value)
    {
        return $_SESSION[$name] = $value;
    }
    public static function get($name)
    {
        return $_SESSION[$name];
    }
     
    public static function delete($name)
    {
        if(self::exists($name))
        {
            unset($_SESSION[$name]);
        }
    }
    
    public static function flash($name , $string = '')
    {
        if(self::exists($name))
        {
            $session = self::get($name); 
            self::delete($name);
            return $session;
        }
        else
        {
            self::put($name , $string);
        }

    }
        
    public static function putObject($name ,$param)
    {
        if(self::exists($name)){
            self::delete($name);
            self::put($name, $param);
        }else{

            self::put($name, $param);
        }
    }
    
    
        
}

