<?php

/**
 * Siehe Dokumentation im DefaultController.
 */
class PasswordController
{
    public function index()
    {
      $view = new View('password_index');
      $view->title = 'Passwordlist';
      $view->heading = 'Passwordlist';
      $view->display();
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

    public function delete()
    {
      $view = new View('password_delete');
      $view->title = 'Delete Password';
      $view->heading = 'Delete Password';
      $view->display();
    }
}
