<?php

use Symfony\Component\Console\Application;

require __DIR__ . '/vendor/autoload.php';

$application = new Application();

$application->add(new \App\Console\Commands\ImportCommand());

$application->run();
