<?php

require_once __DIR__.'/VehicleType.php';
require_once __DIR__.'/Vehicle.php';
require_once __DIR__.'/Car.php';

function run(): never
{
    $car = new Car('Renault', 'R5');

    $car2 = new Car('Citroën', 'Visa');

    echo $car->start()."\n";
    echo $car2->start()."\n";

    exit(0);
}

run();
