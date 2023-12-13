<?php

namespace App\User;

use App\User\Interface\AuthInterface;

class Member implements AuthInterface
{
    protected static int $childCounter = 0;
    protected static int $counter = 0;

    public function __construct(
        protected readonly string $login,
        protected readonly string $password,
        protected readonly int $age,
    ) {
        static::$childCounter++;
        static::$counter++;
    }

    public function __destruct()
    {
        static::$childCounter--;
        static::$counter--;
    }

    public function getAge(): int
    {
        return $this->age;
    }

    public function getLogin(): string
    {
        return $this->login;
    }

    public function auth(string $login, string $password): bool
    {
        if (false === ($login === $this->login && password_verify($password, $this->password))) {
            throw new \Exception('Authentication failed!');
        }

        return true;
    }

    public function __toString(): string
    {
        return sprintf("Ce membre s'appelle %s et a %d ans\n", $this->login, $this->age);
    }

    public static function create(string $login, string $plainPassword, int $age): static
    {
        $password = password_hash($plainPassword, PASSWORD_BCRYPT);

        return new static($login, $password, $age);
    }

    public static function count(): int
    {
        return static::$counter;
    }

    public static function countAll(): int
    {
        return static::$childCounter;
    }
}
