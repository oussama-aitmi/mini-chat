<?php

use App\Service\Dispatcher;

require __DIR__ . '/../Autoloader.php';

Autoloader::register();

session_start();

$dispatcher = new Dispatcher();
$dispatcher->dispatch();