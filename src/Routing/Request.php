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
