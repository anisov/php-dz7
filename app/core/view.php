<?php

namespace App\Core;

class View
{
    public function render(String $filename, array $data)
    {
        $templateName = TEMPLATE_DIR . DIRECTORY_SEPARATOR . $filename . ".php";
        extract($data);
        require $templateName;
        die();
    }
}
