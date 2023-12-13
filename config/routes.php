<?php

use App\Controller;
use App\Routing\Request;
use App\Routing\Router;

return function (Request $request, Controller $controller) {
    $router = new Router();

    $router->addRoute('GET', '/', $controller->index(...));

    $router->addRoute('GET', '/post', $controller->post(...));

    $router->addRoute('GET', '/new-post', $controller->form(...));

    $router->addRoute('POST', '/add-post', $controller->addPost(...));

    return $router;
};
