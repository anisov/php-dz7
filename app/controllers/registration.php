<?php
//$modelsDir = realpath(__DIR__ . '/../models');
//$controllersDir = realpath(__DIR__ . '');
//$coreDir = realpath(__DIR__ . '/../core');
//
//require_once($modelsDir . DIRECTORY_SEPARATOR . 'users.php');
//require_once($controllersDir . DIRECTORY_SEPARATOR . 'cryptPassword.php');
//require_once($coreDir . DIRECTORY_SEPARATOR . 'MainController.php');
namespace App;
include('cryptPassword.php');

class Registration extends MainController
{
    public function index()
    {
        $data = [];
        if ($_POST) {
            $users = new Users();
            $login = $_POST['login'];
            $password = $_POST['password'];
            $password2 = $_POST['password2'];
            $name = $_POST['name'];
            $age = $_POST['age'];
            $description = $_POST['description'];
            $photo = empty($_FILES['photo']) ? null : $_FILES['photo'];
            $ext = strtolower(pathinfo($photo['name'], PATHINFO_EXTENSION));
            $img_exts = ['jpeg', 'jpg', 'png', 'gif'];
            if (!$login){
                $data['error']['error-login'] = 'Введите логин';
            }
            if (!$password){
                $data['error']['error-password'] = 'Введите пароль';
            }
            if (!$name){
                $data['error']['error-name'] = 'Введите имя';
            }
            if ($password != $password2) {
                $data['error']['error-password'] = 'Несовпадают пароли';
            }
            if (!$photo) {
                $data['error']['error-photo'] = 'Загрузите картинку';
            } else {
                if ($photo['error'] !== UPLOAD_ERR_OK) {
                    $data['error']['error-photo'] = 'Ошибка загрузки';
                }
                if (!in_array($ext, $img_exts)) {
                    $data['error']['error-photo'] = 'Неверный формат картинки';
                }
            }
            if($age){
                if (!ctype_digit($age)) {
                    $data['error']['error-age'] = 'Возраст должен быть цифрами';
                }
            }else{
                $data['error']['error-age'] = 'Введите возраст';
            }
            if ($data['error']) {
                $this->view->render('registration', $data);
            }
            $maxId = $users->getMaxId() + 1;
            $photoName = md5($maxId);
            move_uploaded_file($photo['tmp_name'], "$this->uploads_dir/$photoName.jpg");
            $getUser = $users->getUser($login);
            if (!$getUser) {
                $password = hash256($password);
                $result = $users->addUser($login, $password, $name, $age, $description, $photoName);
                if ($result == false) {
                    $data = [
                        'error' => [
                            'error-login' => 'Такой логин уже существует!'
                        ]
                    ];
                    $this->view->render('registration', $data);
                }
                $this->redirect('registration');
            } else {
                $data = [
                    'error' => [
                        'error-login' => 'Такой логин уже существует!'
                    ]
                ];
                $this->view->render('registration', $data);
            }
        }
        $this->view->render('registration', $data);
    }
}