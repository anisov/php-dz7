<?php

namespace App\Controllers;

use App\Core\MainController;
use App\Models\User;


class UserShow extends MainController
{
    public function index()
    {
        $data = [];
        $_SESSION["user"];
        if ($_SESSION["user"]) {
            $allUsers = User::all();
            $data['users'] = $allUsers;
            $this->view->render('allUsers', $data);
        } else {
            $this->redirect('/');
        }
    }
}
