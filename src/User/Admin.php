<?php

namespace App\User;

use App\User\Enum\AdminLevel;

class Admin extends Member
{
    protected static int $counter = 0;

    public function __construct(
        string $login,
        string $password,
        int $age,
        protected readonly AdminLevel $level = AdminLevel::Admin,
    ) {
        parent::__construct($login, $password, $age);
    }

    public function auth(string $login, string $password): bool
    {
        if (AdminLevel::SuperAdmin === $this->level) {
            return true;
        }

        return parent::auth($login, $password);
    }

    public function __toString(): string
    {
        return sprintf("Ce %s s'appelle %s et a %d ans\n", $this->level->getLabel(), $this->login, $this->age);
    }

    public static function create(string $login, string $plainPassword, int $age, bool $superadmin = false): static
    {
        $password = password_hash($plainPassword, PASSWORD_BCRYPT);
        $level = $superadmin ? AdminLevel::SuperAdmin : AdminLevel::Admin;

        return new static($login, $password, $age, $level);
    }
}
