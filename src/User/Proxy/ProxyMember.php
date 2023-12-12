<?php

namespace App\User\Proxy;

use App\User\Interface\AuthInterface;
use App\User\Member;
use App\Cache\Interface\CacheInterface;

class ProxyMember implements AuthInterface
{
    public function __construct(
        protected readonly Member $inner,
        protected readonly CacheInterface $cache
    ) {}

    public function auth(string $login, string $password): bool
    {
        return $this->cache->get($login)
            ?? $this->cache->set($login, $this->inner->auth($login, $password));
    }
}
