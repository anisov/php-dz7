<?php

namespace App;

function hash256($password)
{
    $password = hash('sha256', $password);
    return $password;
}

