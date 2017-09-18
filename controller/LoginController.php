<?php

require_once '../repository/UserRepository.php';

class LoginController
{
  public function index()
{
  $userRepository = new UserRepository();

  $view = new View('login');
  $view->title = 'Login';
  $view->error = false;
  $view->heading = 'Login';
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

  $view = new View('login');
  $view->title = 'Login';
  $view->heading = 'Login';
  $view->error = !$loggedIn;
  $view->display();

  }
}
