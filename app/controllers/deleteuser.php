<?php

namespace App\Controllers;

use App\Core\MainController;
use App\Models\User;

class DeleteUser extends MainController
{
    public function index()
    {
        $id = $_GET['id'];
        $user = User::find($id);
        $user->delete();
        $this->redirect('usershow');
    }
}