<?php
namespace PHPMVC\CONTROLLERS;
use PHPMVC\LIB\DATABASE\DB;
use PHPMVC\CONTROLLERS\AbstractController;
use PHPMVC\LIB\CLASSES\Session;
use PHPMVC\LIB\VALIDATION\Validation;
use PHPMVC\MODELS\Employee;
use PHPMVC\MODELS\Input;

class EmployeeController extends AbstractController
{
    public function defaultAction()
    {
        
        $emps = DB::getInstance()->get('employees',array( 'id' , '>','0'));
        $row = (array) $emps->results();
        Session::putObject('employees',$row); 
        $this->_view();
    }

    public function addAction()
    {
        $this->_view();
    }

    public function editAction()
    {
        $emEdit = DB::getInstance()->update('employees', 1 , array(
            'name' => 'alhelaly',
            'salary' => '8700'
        )); 
        $this->_view();

        
    }
    
    public function storeAction()
    {


        if(Input::exists())
        {
            
            $validate = new Validation();
            $validation = $validate->check($_POST , array(
                'name' => array(
                    'name' => 'name', 
                    'required' => true,
                    'min' => 3, 
                    'max' => 50
                ),
                'age' => array(
                    'name' => 'age', 
                    'required' => true,
                    'min' => 2,
                    'max' => 4, 
                ),
                
                'gender' => array(
                    'name' => 'gender', 
                    'required' => true,
                    'min' => 1,
                    'max' => 4, 
                    'bool' => true,
                ),
                
                'address' => array(
                    'name' => 'address', 
                    'required' => true,
                    'min' => 1,
                    'max' => 50, 
                ),
                'systemsCanUse' => array(
                    'name' => 'systemsCanUse', 
                    'required' => true,
                    'min' => 1,
                    'max' => 8, 
                ),
                'salary' => array(
                    'name' => 'salary', 
                    'required' => true,
                    'min' => 3,
                    'max' => 11,
                    'min_value' => 1000,
                    'max_value' => 1000000, 
                ),

                'taxRate' => array(
                    'name' => 'taxRate', 
                    'required' => true,
                    'min' => 1,
                    'max' => 4,
                    'min_value' => 0,
                    'max_value' => 5, 
                ),
                'notes' => array(
                    'name' => 'notes', 
                    'required' => false,
                ),
                'job_type' => array(
                    'name' => 'job_type', 
                    'required' => true,
                    'bool' => true,
                ),
            ));
            
            $emp = new Employee();
            if($validation->passed()){

            
            try{

            
            $emp->create(array(
                'name' => Input::get('name'),
                 'age' => Input::get('age'),
                 'gender' => Input::get('gender'), 
                 'address' => Input::get('address'), 
                 'systemsCanUse' => implode(',',Input::get('systemsCanUse')), 
                 'salary' => Input::get('salary'), 
                 'taxRate' => Input::get('taxRate'),
                 'notes' => Input::get('notes'), 
                 'job_type' =>Input::get('job_type'), 
                 
             ));
                Session::flash('employee_added_success', 'تمت اضافة الموظف');
                $this->defaultAction();
                }
                 catch (Exception $e) {
                        die($e->getMessage());
                 }

            } else
            {
                    foreach ($validation->errors() as $error) 
                 {
                        echo $error ,'<br>'; 
                 }

            }

        }
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
