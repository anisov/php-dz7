<?php

namespace App\Controllers;

use App\Core\MainController;
use App\Models\User;

include('cryptPassword.php');

class EditUser extends MainController
{
    public function index()
    {
        $data = [];
        $_SESSION["user"];
        if ($_SESSION["user"]) {
            if ($_POST) {
                $data = [];
                $password = $_POST['password'];
                $password2 = $_POST['password2'];
                $name = $_POST['name'];
                $age = $_POST['age'];
                $description = $_POST['description'];

                if (!$password) {
                    $data['error']['error-password'] = 'Введите пароль';
                }
                if (!$name) {
                    $data['error']['error-name'] = 'Введите имя';
                }
                if ($password != $password2) {
                    $data['error']['error-password'] = 'Несовпадают пароли';
                }

                if ($age) {
                    if (!ctype_digit($age)) {
                        $data['error']['error-age'] = 'Возраст должен быть цифрами';
                    }
                } else {
                    $data['error']['error-age'] = 'Введите возраст';
                }
                if ($data['error']) {
                    $id = $_GET['id'];
                    $user = User::find($id);
                    $data['user'] = $user;
                    $data['id'] = $id;
                    $this->view->render('edit', $data);
                }

                $password = hash256($password);

                $id = $_GET['id'];
                $user = User::find($id);
                $user->name = $name;
                $user->password = $password;
                $user->age = $age;
                $user->description = $description;;
                $user->save();
                $this->redirect("/edituser?id=$id", $data);
            }
            if ($_GET) {
                $id = $_GET['id'];
                if (empty($id)) {
                    die('Такого пользователя нет');
                }
                $user = User::find($id);
                $data['user'] = $user;
                $data['id'] = $id;
                $this->view->render('edit', $data);
            }
        } else {
            $this->redirect('/');
        }
    }
}