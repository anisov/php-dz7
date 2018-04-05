<?php

namespace App;
include('cryptPassword.php');
class Main extends MainController
{
    public function index()
    {
        if ($_POST) {
            $users = new Users();
            $login = $_POST['login'];
            $password = $_POST['password'];
            $currentUser = $users->getUser($login);
                if ($currentUser){
                    $ownPassword = $currentUser['password'];
                    $currentPassword = hash256($password);
                    if ($ownPassword == $currentPassword){
                        $_SESSION["user"] = $currentUser['name'];
                    }
                }
        }
        $data =[$_SESSION["user"]];
        $this->view->render('index', $data);
    }
}