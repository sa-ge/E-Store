<?php
namespace PHPMVC\CONTROLLERS;
use PHPMVC\LIB\DATABASE\DB;
use PHPMVC\CONTROLLERS\AbstractController;

class EmployeeController extends AbstractController
{
    public function defaultAction()
    {
        
        $emps = DB::getInstance()->get('employees',array( 'id' , '>','0'));
        
       if(!is_null($emps->results())){ 
              for($counter = 0; $counter <= count($emps->results()); $counter=$counter +1)
              {
                $row = $emps->results();
                $_SESSION['employees'] = $row;
              
              }
           }
               $this->_view();
    }
    public function addAction()
    {
        $this->_view();
    }   public function editAction()
    {
        $this->_view();

    }

    public function storeAction()
    {
        static $age;
        static $name;
        static $address;
        static $gender;
        static $sys = array();
        static $salary;
        static $taxRate;
        static $notes;
        if(isset($_POST['submit']))
        {
            $name= $_POST['name'];
            $age = $_POST['age'];
            $address = $_POST['address'];
            $gender = $_POST['gender'];
            $notes = $_POST['notes'];
            $taxRate = $_POST['tax'];
            $salary =$_POST['salary'];
            $sys = $_POST['os'];
        }

        $os = implode(',',$sys);
        $emp = DB::getInstance()->insert('employees', array(
             'name' => $name,
             'age' => $age,
             'gender' => $gender, 
             'address' => $address, 
             'systemsCanUse' => $os, 
             'salary' => $salary, 
             'taxRate' => $taxRate,
             'notes' => $notes
             
         ));
         header("Location:default");
        
        // $em = DB::getInstance()->get('employees' , array('id' ,'=', '1'));
        // if(!$em->count()){
        //     echo "no user";
        // }
        // else 
        // {
        //     foreach($em->results() as $emp){
        //         echo $emp->systemsCanUse;
        //         }
            
        // }
         
    }
}
