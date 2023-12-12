<?php

use App\User\Admin;
use App\User\Interface\AuthInterface;

function auth(array $argv): never
{
    $user = Admin::create('Bob', 'admin1234', 35, false);

    $login = $argv[2];
    $password = $argv[3];

    try {
        $user->auth($login, $password);
        echo $user;
    } catch (\Exception) {
        echo "Authentication failed.\n";
    }

    exit(0);
}

