<?php

namespace App\Routing;

class Router
{
    private array $routes = [];

    public function addRoute(string $method, string $path, callable $handler): void
    {
        $this->routes[$method][$path] = $handler;
    }

    public function handleRequest(Request $request): void
    {
        $method = $request->getMethod();
        $path = $request->getPath();

        if (isset($this->routes[$method][$path])) {
            $handler = $this->routes[$method][$path];
            $handler();
        } else {
            echo "404 Not Found";
        }
    }
}
