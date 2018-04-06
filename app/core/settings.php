<?php
$config = include('config.php');
$config = $config['db'];
require __DIR__ . '/../../vendor/autoload.php';

use Illuminate\Database\Capsule\Manager as Capsule;

$host = $config["host"];
$db = $config["dbname"];
$charset = $config["charset"];
$user = $config["user"];
$password = $config["password"];

$dsn = "mysql:host=$host; dbname=$db;charset=$charset";
$configArray = [];

$DBH = new PDO($dsn, $user, $password);
$configArray['DBH'] = $DBH;


$uploads_dir = 'uploads';
$configArray['uploads_dir'] = $uploads_dir;

return $configArray;