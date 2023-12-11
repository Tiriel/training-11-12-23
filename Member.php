<?php

class Member
{
    public function __construct(
        protected readonly string $login,
        protected readonly string $password,
        protected readonly int $age,
    ) {
    }

    public function auth(string $login, string $password): bool
    {
        return $login === $this->login && $password === $this->password;
    }
}
