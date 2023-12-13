<?php

namespace App\Routing;

class Request
{
    protected string $path;

    protected string $method;

    protected array $query;

    protected array $data;

    public function __construct()
    {
        $this->path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $this->method = $_SERVER['REQUEST_METHOD'];
        $this->query = $_GET;
        $this->data = $_POST;
    }

    public function getPath(): string
    {
        return $this->path;
    }

    public function getMethod(): string
    {
        return $this->method;
    }

    public function getQuery(): array
    {
        return $this->query;
    }

    public function getData(): array
    {
        return $this->data;
    }
}
