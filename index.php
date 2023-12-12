<?php

use App\Controller;
use App\Database\Connection;
use App\Database\Persister;
use App\Routing\Request;

require_once __DIR__.'/vendor/autoload.php';

$request = new Request();
$persister = new Persister(Connection::getInstance());
$controller = new Controller($persister);

$router = require __DIR__.'/routes.php';
$router = $router($controller, $request);

$router->handleRequest($request);
