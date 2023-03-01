<?php

use Azatakmyradov\Routing\Controllers\HomeController;

$router->get('/', [HomeController::class, 'index']);
$router->post('/', [HomeController::class, 'post']);
$router->put('/users/{id}', [HomeController::class, 'users']);