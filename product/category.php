<?php
require_once 'config.php';

class Category extends \Illuminate\Database\Eloquent\Model
{

}

$category = Category::all();
var_dump($category);