<?php

use Symfony\Component\Console\Application;

require_once __DIR__ . '/init.php';

$application = new Application();

$application->add(new \App\Console\Commands\ImportCommand());

$application->run();
