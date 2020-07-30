<?php

namespace PHPMVC\LIB\DATABASE;

function escape($string)
{
    return htmlentities($string ,ENT_QUOTES, 'UTF-8');
    
}
