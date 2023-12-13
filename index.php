<?php

use App\Controller;
use App\Database\Connection;
use App\Database\PostMapper;
use App\Database\Repository;
use App\Routing\Request;
use App\Routing\Router;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;

require_once __DIR__.'/vendor/autoload.php';

$request = new Request();
$repository = new Repository(Connection::getPdo(), new PostMapper());
$twig = new Environment(new FilesystemLoader([__DIR__.'/templates']));
$controller = new Controller($repository, $twig);

$router = include './config/routes.php';
$router = $router($request, $controller);

$router->handleRequest($request);
