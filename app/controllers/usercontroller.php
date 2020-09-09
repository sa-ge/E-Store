<?php
namespace PHPMVC\CONTROLLERS;
use PHPMVC\CONTROLLERS\AbstractController;
use PHPMVC\MODELS\Input;
use PHPMVC\LIB\VALIDATION\Validation;
use PHPMVC\LIB\CLASSES\Hash;
use PHPMVC\LIB\CLASSES\Redirect;
use PHPMVC\LIB\CLASSES\Session;
use PHPMVC\LIB\CLASSES\Token;
use PHPMVC\MODELS\User;
use PHPMVC\LIB\DATABASE\DB;

class userController extends AbstractController
{
    public function defaultAction()
    {
        $db = DB::getInstance()->get('users'  ,array( 'id' ,'>', '0' ));
        $row = (array) $db->results();
        Session::putObject('users',$row);
        $this->_view();
    }
    public function createAction()
    {
        $this->checkAction();
        $this->_view();

    }

    public function editAction()
    {
        $this->_view();

    }
    public function deleteAction()
    {
        $ID = 0;
            $id = explode(DIRECTORY_SEPARATOR,$_SERVER['REQUEST_URI']);
        for($x = 0 ; $x < count($id); $x++){
              if(is_numeric($id[$x])){
                $ID = $id[$x];
              }
            }
        if($ID > 0){
        $de = DB::getInstance()->delete('users', array('id' , '=' ,$ID));
        }
        $this->setAction('default');
        $this->defaultAction();

    }


    public function validate()
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
                    return true;
                }
                else
                {
                        Session::flash('errors',$validation->errors());
                }

                return false;
    }

    // validation of feilds  when create new user page
    public function checkAction()
    {
        if( Input::exists())
        {
        if(Token::check(Input::get('token')))
        {
                if($this->validate())
                {
                    $user = new User();
                    $salt = bin2hex(Hash::salt(16));
                    try {
                        $user->create(array(
                        'user_name' => Input::get('user_name'),
                        'password' => Hash::make(Input::get('password'), $salt),
                        'salt' => $salt,
                        'name' => Input::get('name'),
                        'joined' => date('Y-m-d H:i:s'),
                        'group' => 2
                        ));

                        Session::flash('sucess', 'تم انشاء الحساب');
                        header('Location:default');

                    } catch (Exception $e) {
                        die($e->getMessage());
                    }
              }
        }else{
            Redirect::to('create');
        }
        }
    }


    public function storeAction()
    {
    }
}
