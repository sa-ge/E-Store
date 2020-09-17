<?php
namespace PHPMVC\CONTROLLERS;
use PHPMVC\LIB\DATABASE\DB;
use PHPMVC\CONTROLLERS\AbstractController;
use PHPMVC\LIB\CLASSES\Session;
use PHPMVC\LIB\CLASSES\Token; use PHPMVC\LIB\VALIDATION\Validation;
use PHPMVC\MODELS\Employee;
use PHPMVC\MODELS\Input;
use PHPMVC\LIB\CLASSES\Redirect;

class EmployeeController extends AbstractController
{
    private $_state = null;
    public function defaultAction()
    {
        $emps = DB::getInstance()->get('employees',array( 'id' , '>','0'));
        $row = (array) $emps->results();
        Session::putObject('employees',$row);
        $this->_view();
    }

    public function addAction()
    {
        $this->_state = 0;
        $this->_view();
    }

    public function editAction()
    {

        $id = (int) $this->_param[0];
        $emp = DB::getInstance()->get('employees', array('id' , '=',$id));
        $row = (array) $emp->results();
        Session::putObject('employee', $row);
        if($row){
        $this->_view();
        }else{
            Redirect::to('/employee/default');
        }
    }

    public function editedAction()
    {
        $this->_state = (int) $this->_param[0];
        $this->storeAction();
    }

    public function deleteAction()
    {

        $id = (int) $this->_param[0];
        $de = DB::getInstance()->delete('employees', array('id' , '=' ,$id));
        $this->setAction('default');
        $this->defaultAction();
    }

    public function validate()
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
                ),
                'job_type' => array(
                    'name' => 'job type',
                    'required' => true,
                    'bool' => true,
                ),
            ));
            if($validation->passed()){
                return true;

            }
            else
            {

                        Session::flash('errors',$validation->errors());
                        $_POST['id'] = $this->_state;
                        Session::putObject('post', $_POST);
                        if($this->_state === 0){
                        Redirect::to('add');
                        }else{
                        Redirect::to("/employee/edit/{$this->_state}");
                        }

            }

            return false;
    }



    public function set()
    {
        if($this->validate())
        {
            $emp = new Employee();
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
                 ),$this->_state);
                if($this->_state == 0){
                    Session::flash('employee_added_success', "تمت اضافة الموظف");
                }else{
                    Session::flash('employee_added_success', "تم تعديل بيانات الموظف بنجاح");
                }
                    Redirect::to('\employee\default');

                    }
                     catch (Exception $e) {
                            die($e->getMessage());
                     }

            }
    }

    public function storeAction()
    {
        if(Input::exists())
        {
                if(Token::check(Input::get('token')))
                {
                    if(!is_numeric($this->_state)){
                        $this->_state = 0;
                    }
                        $this->set();

                }
        }

    }
}

