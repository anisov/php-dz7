<?php
session_start();
$appDir = realpath(__DIR__ . '/../app');
require_once ($appDir . DIRECTORY_SEPARATOR . "core/config.php");
require_once ($appDir . DIRECTORY_SEPARATOR . "core/MainController.php");
require_once ($appDir . DIRECTORY_SEPARATOR . "core/view.php");
require_once ($appDir . DIRECTORY_SEPARATOR . "models/users.php");

$routes = explode('/', $_SERVER['REQUEST_URI']);
$controller_name = "Main";
$action_name = 'index';

// получаем контроллер
if (!empty($routes[1])) {
    $controller_name = $routes[1];
    $exploaded = explode('?',$controller_name);
    $controller_name = $exploaded[0];
}
//// получаем действие
//if (!empty($routes[2])) {
//    $action_name = $routes[2]; //php
//}
$filename = ($appDir . DIRECTORY_SEPARATOR . "controllers/".strtolower($controller_name).".php");
try {
    if (file_exists($filename)) {
        require_once $filename;
    } else {
        throw new Exception("File not found");
    }
    $classname = '\App\\'.ucfirst($controller_name);
    if (class_exists($classname)) {
        $controller = new $classname();
    } else {
        throw new Exception("File found but class not found");
    }
    if (method_exists($controller, $action_name)) {
        $controller->$action_name();
    } else {
        throw new Exception("Method not found");
    }
} catch (Exception $e) {
    require($appDir . DIRECTORY_SEPARATOR . "errors/404.php");
}

