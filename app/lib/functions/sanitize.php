<?php

namespace PHPMVC\LIB\FUNCTIONS;

class Sanitize
{
    public static function escape($string)
    {
    return htmlentities($string ,ENT_QUOTES, 'UTF-8');

    }
}
