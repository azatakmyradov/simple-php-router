<?php

use Azatakmyradov\Routing\Exceptions\RouteNotFoundException;
use Azatakmyradov\Routing\Router;

require '../src/functions.php';
require base_path('vendor/autoload.php');

$router = new Router;

require base_path('routes.php');

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

$router->route($uri);