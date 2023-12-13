<?php

namespace App\Cache;

use App\Cache\Interface\CacheInterface;

class ArrayCache implements CacheInterface
{
    public array $cache = [];

    public function get(string $key): mixed
    {
        return array_key_exists($key, $this->cache) ? $this->cache[$key] : null;
    }

    public function set(string $key, mixed $value): mixed
    {
        return $this->cache[$key] = $value;
    }
}
