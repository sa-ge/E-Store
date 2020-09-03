<?php
namespace PHPMVC\CONTROLLERS;
use PHPMVC\LIB\DATABASE\DB;
use PHPMVC\CONTROLLERS\AbstractController;


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
    
    public function storeAction()
    {

    }
}
