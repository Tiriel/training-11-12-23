<?php

use App\Iterator\StepIterator;

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

