<?php 
namespace PHPMVC\CONTROLLERS;

class IndexController extends AbstractController
{
    public function defaultAction()
    {
        $this->_view();
    }
    public function addAction()
    {
        $this->_view();
    }
}
