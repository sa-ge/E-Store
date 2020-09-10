<?php

namespace PHPMVC\MODELS;

use Exception;
use PHPMVC\LIB\DATABASE\DB;

class User
{
    private $_db;

       public function __construct($user = null)
       {
           $this->_db = DB::getInstance();
       }

       public function create($fields = array(),$id = 0)
       {
           if($id === 0){
               if(!$this->_db->insert('users', $fields))
               {
                throw new Exception('There was a problem creating an account. ');
               }
           }
           else{
               if(!$this->_db->update('users', $id ,$fields))
               {
                   throw new Exception('There was a problem updating  the account. ');
               }

           }
       }


}
