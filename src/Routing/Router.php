<?php

namespace App\Routing;

class Router
{
    protected array $routes = [];

    public function addRoute(string $method, string $path, callable $handler): void
    {
        $this->routes[$method][$path] = $handler;
    }

    public function handleRequest(Request $request): void
    {
        $method = $request->getMethod();
        $path = $request->getPath();

        if (!isset($this->routes[$method][$path])) {
            echo 'Page not found.';
            return;
        }

        $handler = $this->routes[$method][$path];
        $handler($request);
    }
}
