<?php

namespace PHPMVC\LIB\VALIDATION;
use PHPMVC\LIB\DATABASE\DB;

use PHPMVC\LIB\FUNCTIONS\Sanitize;

class Validation
{

    private $_passed = false,
        $_errors = array(),
        $_db= null;

    /**
     * @param $dependencies
     */
    public function __construct()
    {
        $this->_db= DB::getInstance();
    }

    public function check($source, $items = array())
    {
        foreach ($items as $item => $rules) {
            foreach($rules as $rule => $rule_value){
                if(is_array($source[$item])){
                        $value = implode(',',$source[$item]);
                        $source[$item] = $value;
                }
                else{

                $value = trim($source[$item]) ;
                }
                $name = $items[$item]['name'];
                $item = Sanitize::escape($item);
                if($rule === 'required' && empty($value) && !is_numeric($value))
                {
                    $this->addError("{$name} is required");
                }
                else if(!empty($value))
                {
                    switch ($rule) {
                        case 'min':
                            if(strlen($value) < $rule_value)
                            {
                                $this->addError("{$item} must be a minimum of {$rule_value}.");
                            }
                            break;
                        case 'max':
                            if(strlen($value) > $rule_value)
                            {
                                $this->addError("{$item} must be a maximum of {$rule_value}.");
                            }
                            break;
                        case 'matches':
                            if($value != $source[$rule_value])
                            {
                                $this->addError("{$rule_value} must match {$name} ");
                            }
                            break;
                        case 'unique':
                            $check = $this->_db->get($rule_value , array($item, '=' , $value)) ;
                                if($check->count()){
                                    $this->addError("{$item} already exists.");
                                }
                            break;
                        case 'bool':
                            if($rule_value > 1 || $rule_value < 0){
                                    $this->addError("{$name} value can be only 0 or 1");
                            }
                            break;
                        case 'min_value':
                            if($value < $rule_value ){
                                $this->addError("{$name} must be a minimum of {$rule_value}.");
                            }
                            break;
                        case 'max_value':
                            if($value > $rule_value ){
                                $this->addError("{$name} must be a maximum of {$rule_value}.");
                            }
                            break;
                        default:
                            break;
                    }
                }

            }
        }
        if(empty($this->_errors))
        {
            $this->_passed = true;
        }
        return $this;

    }
    private function addError($error)
    {
        $this->_errors[] = $error;
    }
    public function errors()
    {
       return $this->_errors;
    }
    public function passed()
    {
        return $this->_passed;
    }


}


