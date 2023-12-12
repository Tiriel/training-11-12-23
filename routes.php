<?php

use App\Controller;
use App\Routing\Request;
use App\Routing\Router;

return function (Controller $controller, Request $request): Router
{
    $router = new Router();

    $router->addRoute('GET', '/', function () use ($controller) {
        $controller->displayBlog();
    });

    $router->addRoute('GET', '/post', function () use ($controller, $request) {
        $postId = $request->getQueryParam('id');
        $controller->displayPost($postId);
    });

    $router->addRoute('GET', '/new-post', function () use ($controller) {
        $controller->postForm();
    });

    $router->addRoute('POST', '/add-post', function () use ($controller, $request) {
        $title = $request->getPostData('title');
        $content = $request->getPostData('content');
        $author = $request->getPostData('author');

        $controller->addPost($title, $content, $author);
    });

    return $router;
};
