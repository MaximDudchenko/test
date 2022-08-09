<?php

$router->add('', ['controller' => \App\Controllers\HomeController::class, 'action' => 'index', 'method' => 'GET']);
$router->add('ajax.posts/store', ['controller' => \App\Controllers\PostController::class, 'action' => 'store', 'method' => 'POST']);
$router->add('ajax.comments/store', ['controller' => \App\Controllers\CommentController::class, 'action' => 'store', 'method' => 'POST']);

