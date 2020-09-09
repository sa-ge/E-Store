<?php

namespace PHPMVC\MODELS;

use Exception;
use PHPMVC\LIB\DATABASE\DB;

class Employee
{

    private $_db;

       public function __construct($user = null)
       {
           $this->_db = DB::getInstance();
       }

       public function create($fields = array(),$id = 0)
       {
           if($id == 0){
               if(!$this->_db->insert('employees', $fields))
               {
                   throw new Exception('There was a problem adding an employee. ');
               }
           }
           else{
               if(!$this->_db->update('employees', $id ,$fields))
               {
                   throw new Exception('There was a problem updating  employee. ');
               }

           }
       }


}

