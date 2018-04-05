<?php

namespace App;
class FileList extends MainController
{
    public function index()
    {
        $data = [];
        $_SESSION["user"];
        if ($_SESSION["user"]) {
            $user = new Users();
            $users = $user->getAllUser();
            $allUsers = [];
            foreach ($users as $u){
                if ($u['photo']){
                    $allUsers[] =$u;
                }
            }
            $data['allUsers'] = $allUsers;
            $data['uploads_dir'] = $this->uploads_dir;
            if ($_GET['delete']){
                $id = $_GET['delete'];
                $currentUser = $user->getUserById($id);
                $photoPas = $this->uploads_dir . '/' . $currentUser['photo'] . '.jpg';
                if ($user->deletePhoto($id)){
                    if(file_exists($photoPas)){
                        unlink($photoPas);
                    }else{
                        $data['error'] = 'Ошибка удаления';
                    }
                    $this->redirect('filelist', $data);
                } else {
                    $data['error'] = 'Ошибка удаления';
                }
            }
            $this->view->render('filelist', $data);
        }else{
            $this->redirect('/', $data);
        }
    }
}