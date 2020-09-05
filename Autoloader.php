<?php

class Autoloader
{
    static function register()
    {
        spl_autoload_register([__CLASS__, 'autoload']);
    }

    static function autoload($class)
    {
        require __DIR__ . DIRECTORY_SEPARATOR . str_replace('\\', DIRECTORY_SEPARATOR, $class) . '.php';
    }
}
