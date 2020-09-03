<?php
namespace PHPMVC\CONTROLLERS;
use PHPMVC\LIB\DATABASE\DB;
use PHPMVC\CONTROLLERS\AbstractController;


class authController extends AbstractController
{
    public function loginAction()
    {
        $this->_view();
    }


    public function defaultAction()
    {
        $this->setAction("/login");

        $this->loginAction(); 
    }
    public function createAction()
    {
        $this->_view();
    }

    public function editAction()
    {
        $this->_view();
        
    }
    
    public function storeAction()
    {

    }
}
