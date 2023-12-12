<?php

use App\Iterator\StepIterator;
use App\User\Admin;
use App\User\Interface\AuthInterface;

require_once __DIR__.'/vendor/autoload.php';

$m1 = Admin::create('Bob', 'admin1234', 35, false);

function auth(array $argv, AuthInterface $user): never
{
    $login = $argv[2];
    $password = $argv[3];

    try {
        $user->auth($argv[2], $argv[3]);
        echo $user;
    } catch (\Exception) {
        echo "Authentication failed.\n";
    }

    exit(0);
}

function step(array $argv): never
{
    $total = $argv[2];
    $step = $argv[3];

    $iterator = new StepIterator(range(0, $total), $step);

    foreach ($iterator->toGenerator() as $key => $value) {
        echo sprintf("%d => %d\n", $key, $value);
    }

    exit(0);
}

if (function_exists($argv[1])) {
    $argv[1]($argv, $m1);
}
