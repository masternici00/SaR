<?php

/**
 * Siehe Dokumentation im DefaultController.
 */
class PasswordController
{
    public function index()
    {
      if (!empty($user)){
        $view = new View('password_index');
        $view->title = 'Passwordlist';
        $view->heading = 'Passwordlist';
        $view->user = $_SESSION['logged_in_user'];
        $view->display();


      }
      else{
        $view = new View('user_login');
        $view->title = 'Login';
        $view->heading = 'Login';
        $view->display();
      }
    }

    public function create()
    {
        $view = new View('password_create');
        $view->title = 'Create Password';
        $view->heading = 'Create Password';
        $view->display();
    }

    public function update()
    {
        $view = new View('password_update');
        $view->title = 'Update Password';
        $view->heading = 'Update Password';
        $view->display();
    }

    public function doDelete(){

    }

    public function doCreate(){

    }
}
