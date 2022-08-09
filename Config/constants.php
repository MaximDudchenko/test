<?php
define('SERVER_PORT', (!empty($_SERVER['SERVER_PORT']) ? ':' . $_SERVER['SERVER_PORT'] : ''));
define('ROOT_URL', $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['SERVER_NAME'] . SERVER_PORT);

define('ROOT_DIR', dirname(__DIR__));
const APP_DIR = ROOT_DIR . '/App/';
const VIEW_DIR = APP_DIR . 'Views/';
const SRC_DIR = ROOT_DIR . '/public/src/';

const DB_HOST = 'localhost';
const DB_NAME = 'root';
const DB_PASSWORD = 'Ky4erya8uy/';
const DB_DATABASE = 'test';
