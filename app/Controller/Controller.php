<?php

namespace App\Controller;

class Controller
{
    public function render($filename, $vars = [])
    {
        extract($vars);

        ob_start();
        require __DIR__ . '/../../templates/' . $filename . '.php';

        echo ob_get_clean();
    }
}
