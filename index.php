<?php

use App\Controller;
use App\Database\Connection;
use App\Database\PostMapper;
use App\Database\Repository;
use App\Routing\Request;
use App\Routing\Router;

require_once __DIR__.'/vendor/autoload.php';

$request = new Request();
$repository = new Repository(Connection::getPdo(), new PostMapper());
$controller = new Controller($repository);

$router = include './config/routes.php';
$router = $router($request, $controller);

$router->handleRequest($request);
