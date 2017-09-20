<?php
require_once '../repository/UserRepository.php';
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
  $view->title = 'Register';
  $view->heading = 'Register';
  $view->ausgabe = '';
  $view->display();
}


public function doCreate(){
  //die("test");
  // Werte aus $POST auslesen.
  $username = $_POST['username'];
  $firstname  = $_POST['firstname'];
  $surname  = $_POST['surname'];
  $password = $_POST['password'];
  // validieren
  $UserRepository = new UserRepository();
  $benutzerexist = $UserRepository->selectUser($username);
  // Benutzername Validierung
  if (isset($username) && !empty($username))
  {
    if ($username !== $benutzerexist)
    {
    }
    else
    {
      $AusgabeControl = 1;
    }
  }
  else
  {
    $AusgabeControl = 1;
  }
  // Vorname Validierung
  if (isset($firstname) && !empty($firstname))
  {
  }
  else
  {
    $AusgabeControl = 1;
  }
  // Nachname Validierung
  if (isset($surname) && !empty($surname))
  {
  }
  else
  {
    $AusgabeControl = 1;
  }
  // Passwort Validierung
  if (isset($password) && !empty($password))
  {
  }
    else
    {
      $AusgabeControl = 1;
    }
  if (empty($AusgabeControl))
  {
          $userrepository = new UserRepository();
          $userid = $userrepository->create($surname, $firstname, $username, $password);
          $ausgabe = 'Der Benutzer wurde Erstellt!';
          $titleAusgabe = 'Success';
  }
  else
  {
      $ausgabe = 'Die Validierung ist Fehlgschlagen!';
      $titleAusgabe = 'Failed';
  }
  $view = new View('ValidierungPage');
  $view->title = $titleAusgabe;
  // $view->user = $_SESSION['logged_in_user'];
  $view->ausgabe = $ausgabe;
  $view->heading = $titleAusgabe;
  $view->display();
  // $view = new View('user_form');
  // $view->title = 'Benutzer erstellen';
  // $view->heading = 'Benutzer erstellen';
  // $view->display();
}
// Ende der Validierung
public function Logout(){
  $_SESSION = [];
  setcookie(session_name(),'',1);
  header("location:/");
}
public function doLogin(){
  echo 'Hallo Labi';
  $userRepository = new UserRepository();
  $error = false;
  $loggedIn = false;

  foreach ($userRepository->readAll() as $user) {
    if ($user->username  == $_POST['username']) {
      if ($user->password  == sha1($_POST['password'])){
        $_SESSION['logged_in_user'] = $user->username;
        $loggedIn = true;
      } else {
        $error = true;
      }
    }
  }
  $error = true;
  if ($loggedIn) {
    header('Location: /');


  }
  else {
    $ausgabe = 'Login Fehlgschlagen!';
    $view = new View('ValidierungPage');
    $view->title = 'Login Fehlgschlagen';
    //$view->user = $_SESSION['logged_in_user'];
    $view->ausgabe = $ausgabe;
    $view->heading = 'Login Fehlgschlagen';
    $view->display();
  }
}
}
