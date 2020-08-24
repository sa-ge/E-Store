<?php

namespace PHPMVC\Models;

class Employee extends AbstractModel 
{
    public $id; 
    public $name; 
    public $age;
    public $address; 
    public $tax;
    public $salary;

        protected static $tableName = 'employee';
        protected static $tableSchema = array(
  
        );

}