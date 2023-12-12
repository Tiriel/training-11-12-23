<?php

namespace App\Routing;

class Request
{
    private string $method;
    private string $path;
    private array $queryParams;
    private array $postData;

    public function __construct()
    {
        $this->method = $_SERVER['REQUEST_METHOD'];
        $this->path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $this->queryParams = $_GET;
        $this->postData = $_POST;
    }

    public function getMethod(): string
    {
        return $this->method;
    }

    public function getPath(): string
    {
        return $this->path;
    }

    public function getQueryParam(string $key): ?string
    {
        return $this->queryParams[$key] ?? null;
    }

    public function getPostData(string $key): ?string
    {
        return $this->postData[$key] ?? null;
    }
}
