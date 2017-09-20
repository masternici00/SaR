<<<<<<< current
<?php

require_once("../repository/UserRepository.php");

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
      $view->ausgabe = '';
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
      $firstname = $_POST['firstname'];
      $surname = $_POST['surname'];
      $username = $_POST['username'];
      $password = $_POST['password'];

      $UserRepository = new UserRepository();
      $benutzerexist = $UserRepository->selectUser($username);


      if (isset($username) && !empty($username))
      {
        $AusgabeControl = 1;
      }
      else{

        if ($username == $benutzerexist)
        {
          $AusgabeControl = 1;
        }
      }


// Vorname Validierung
      if (isset($firstname) && !empty($firstname))
      {
        $AusgabeControl = 1;
      }
// Nachname Validierung
    if (isset($surname) && !empty($surname))
    {
      $AusgabeControl = 1;
    }
    // Passwort Validierung
    if (isset($password) && !empty($password))
    {
      $AusgabeControl = 1;
    }

    if (empty($AusgabeControl))
    {
        $userrepository = new UserRepository();
        $userid = $userrepository->create($firstname, $surname, $username, $password);
        $ausgabe = 'Der Benutzer wurde Erstellt!';
    }
else
{
    $ausgabe = 'Die Validierung ist Fehlgschlagen!';
}
<<<<<<< HEAD
$view = new View('user_singin');
$view->title ='Status';
//$view->user = $_SESSION['logged_in_user'];
$view->ausgabe = $ausgabe;
$view->heading = 'Status';
$view->display();
// $view = new View('user_form');
// $view->title = 'Benutzer erstellen';
// $view->heading = 'Benutzer erstellen';
// $view->display();
}
    }
=======
=======
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
      $password = sha1($password);
       $query = "INSERT INTO $this->tableName (firstname, lastname, username, password) VALUES (?, ?, ?, ?)";
       $statement = ConnectionHandler::getConnection()->prepare($query);
       $statement->bind_param('ssss', $firstname, $lastname, $username, $password);

       if (!$statement->execute()) {
           throw new Exception($statement->error);
       }
       return $statement->insert_id;
   }
 }
>>>>>>> before discard
>>>>>>> f1ab1a5301faad84fa12a20ddcaaf011ad74e0ee
