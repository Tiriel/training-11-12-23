<?php

use App\User\Admin;
use App\User\Interface\AuthInterface;

require_once __DIR__.'/vendor/autoload.php';

$m1 = Admin::create('Bob', 'admin1234', 35, false);

function run(AuthInterface $user, array $argv): never
{
    $login = $argv[1];
    $password = $argv[2];

    try {
        $user->auth($argv[1], $argv[2]);
        echo $user;
    } catch (\Exception) {
        echo "Authentication failed.\n";
    }

    exit(0);
}

run($m1, $argv);
