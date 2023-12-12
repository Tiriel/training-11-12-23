<?php

namespace App\User\Interface;

interface AuthInterface
{
    public function auth(string $login, string $password): bool;
}
