<?php

ini_set("display_errors", 1);
error_reporting(E_ALL);

require_once __DIR__ . '/Config/constants.php';
require_once ROOT_DIR . '/vendor/autoload.php';

use Core\Router;

try {
    $router = new Router();

    require_once ROOT_DIR . '/routes.php';

    if (!preg_match('/src/', $_SERVER['REQUEST_URI'])) {
        $router->dispatch($_SERVER['REQUEST_URI']);
    }
} catch (Exception $e) {
    die($e);
}




require __DIR__ . '/test.php';