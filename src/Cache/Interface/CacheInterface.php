<?php

namespace App\Cache\Interface;

interface CacheInterface
{
    public function get(string $key): mixed;

    public function set(string $key, mixed $value): mixed;
}
