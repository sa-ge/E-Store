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
    private $_state = null;
    public function defaultAction()
    {
        $db = DB::getInstance()->get('users'  ,array( 'id' ,'>', '0' ));
        $row = (array) $db->results();
        Session::putObject('users',$row);
        $this->_view();
    }
    public function createAction()
    {
        $this->storeAction();
        $this->_view();

    }

    public function editAction()
    {

        $id = (int) $this->_param[0];
        $emp = DB::getInstance()->get('users', array('id' , '=',$id));
        $row = (array) $emp->results();
        Session::putObject('user', $row);
        if($row){
        $this->_view();
        }else{
            Redirect::to('/user/default');
        }
    }
    public function editedAction()
    {
        $this->_state = (int) $this->_param[0];
        $this->storeAction();
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
                    foreach ($validation->errors() as $error)
                    {

                        Session::flash('errors',$validation->errors());
                        $_POST['id'] = $this->_state;
                        Session::putObject('post', $_POST);
                        echo $error ,'<br>';
                        if($this->_state === 0){
                        Redirect::to('add');
                        }else{
                        Redirect::to("/user/edit/{$this->_state}");
                        }
                    }
                }

                return false;
    }

    public function set()
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
                        'goup' => (int) Input::get('group'),
                        ),$this->_state);

                if($this->_state == 0){
                    Session::flash('user_added_success', "تم انشاء الحساب بنجاح");
                }else{
                    Session::flash('user_added_success', "تم تعديل البيانات بنجاح");
                }
                    Redirect::to('\user\default');

                    } catch (Exception $e) {
                        die($e->getMessage());
                    }
                }
    }
    // validation of feilds  when create new user page
    public function storeAction()
    {
        if( Input::exists())
        {
//            if(Token::check(Input::get('token')))
  //          {

                if(!is_numeric($this->_state)){
                    $this->_state = 0;
                }
                    $this->set();
   //         }
        }


    }
}
