<?php

require_once __DIR__.'/vendor/autoload.php';

$func = $argv[1];
$file = __DIR__.'/bin/'.$func.'.php';
if (!\file_exists($file)) {
    printf("Function %s does not exist.\n", $func);

    exit(1);
}

require_once $file;

$func($argv);
