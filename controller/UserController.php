<?php

/**
 * Siehe Dokumentation im DefaultController.
 */
class UserController
{
    public function login()
    {

      $view = new View('user_login');
      $view->title = 'Login';
      $view->heading = 'Login';
      $view->display();
    }

    public function singin()
    {
      $view = new View('user_singin');
      $view->title = 'Sing In';
      $view->heading = 'Sing In';
      $view->display();
    }

    public function doLogin()
    {
      $userRepository = new UserRepository();
      $loggedIn = false;
      foreach ($userRepository->readAll() as $user) {
        if ($user->email == $_POST['username']){
          if ($user->password == shal($_POST['password'])) {
            $_SESSION['logged_in_user'] = $user->id;
            $loggedIn = true;
          }
        }
      }
    }
    public function doCreate()
    {

    }
}
