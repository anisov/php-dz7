<?php

namespace App;

abstract class DBHConnect
{
    protected $DBH;

    function __construct()
    {
        $settingsDir = realpath(__DIR__ . '/../core');
        $configArray = include($settingsDir . DIRECTORY_SEPARATOR . 'settings.php');
        $this->DBH = $configArray['DBH'];
    }
}