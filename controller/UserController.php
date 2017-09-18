<?php

/**
 * Siehe Dokumentation im DefaultController.
 */
class UserController
{
    public function index()
    {
      $view = new View('user_index');
      $view->title = 'Login';
      $view->heading = 'Login';
      $view->display();
    }

    public function create()
    {
        $view = new View('user_create');
        $view->title = 'Create User';
        $view->heading = 'Create User';
        $view->display();
    }

    public function doLogin() {

    }


    public function doCreate() {


    }
}
