<?php

namespace App\Cache;

use App\Cache\Interface\CacheInterface;

class ArrayCache implements CacheInterface
{
    protected array $cache = [];

    public function get(string $key): mixed
    {
        return $this->cache[$key];
    }

    public function set(string $key, mixed $value): mixed
    {
        return $this->cache[$key] = $value;
    }
}
