<?php
namespace PHPMVC\CONTROLLERS;
use PHPMVC\CONTROLLERS\AbstractController;
use PHPMVC\MODELS\Input;
use PHPMVC\LIB\VALIDATION\Validation;

class userController extends AbstractController
{
    public function defaultAction()
    {
               $this->_view();
    }

    public function createAction()
    {
        $this->_view();
    }

    public function editAction()
    {
        $this->_view();
        
    }

    // validation of feilds  when create new user page
    public function checkAction()
    {
        if( Input::exists())
        {
            $validate = new Validation();
                $validation = $validate->check($_POST, array(
                'name' => array( 
                    'name'=> 'name',
                    'required' => true, 
                    'min' => 2, 
                    'max' => 50
                ),
                'user_name' => array(
                    'name'=> 'user name',
                    'required' => true, 

                    'min' => 2, 
                    'max' => 20, 
                    'unique' => 'users'
                ),
                'password' => array(
                    'name'=> 'password',
                    'required' => true, 
                    'min' => 6, 
                ),
                'password_again' => array( 
                    'name'=> 'password confirm',
                    'required' => true, 
                    'matches' => 'password', 
                )

            ));
        
        
            if($validation->passed())
            {
                echo "passed" ;
            } 
            else
            {
                
                $this->setAction("create");
                $this->createAction();
            }
        }
    } 

    
    public function storeAction()
    {
    }
}
