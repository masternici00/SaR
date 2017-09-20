<?php

/**
 * Siehe Dokumentation im DefaultController.
 */
class PasswordController
{
    public function index()
    {

      if (isset($_SESSION['logged_in_user'])){
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
           $UserController = new UserController;
           $konto = $UserController->postCheck($_POST['konto']);
           $username = $UserController->postCheck($_POST['username']);
           $password = $UserController->postCheck($_POST['password']);
           $comment = $UserController->postCheck($_POST['comment']);
           $PasswordRepository = new PasswordRepository();
           $Passwordexist = $PasswordRepository->selectPassword($task);
           $AusgabeControl = 0;
           if (empty($konto) || empty($username) || empty($password) || empty($comment))
           {
             $AusgabeControl = 1;
           }
           else {
             if (empty($Passwordexist)){
               $AusgabeControl = 1;
             }
           }
           if ($AusgabeControl == 0)
           {
                   $PasswordRepository = new PasswordRepository();
                   $userid = $PasswordRepository->create($konto, $username, $password, $comment);
                   $ausgabe = 'Das Password wurde erstellt';
                   $titleAusgabe = 'Success';
           }
           else
           {
               $ausgabe = 'Die Validierung ist Fehlgschlagen!';
               $titleAusgabe = 'Failed';
           }
           $view = new View('ValidierungPage');
           $view->title = $titleAusgabe;
           $view->user = $_SESSION['logged_in_user'];
           $view->ausgabe = $ausgabe;
           $view->heading = $titleAusgabe;
           $view->display();
         }





}
