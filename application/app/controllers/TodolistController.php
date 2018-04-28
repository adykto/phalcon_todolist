<?php

class TodolistController extends \Phalcon\Mvc\Controller
{

    public function indexAction()
    {
        $this->view->todolist = Todolist::find();
    }

}

