<?php

require_once __DIR__.'/VehicleType.php';
require_once __DIR__.'/Vehicle.php';
require_once __DIR__.'/Car.php';
require_once __DIR__.'/AuthInterface.php';
require_once __DIR__.'/AdminLevel.php';
require_once __DIR__.'/Member.php';
require_once __DIR__.'/Admin.php';


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
