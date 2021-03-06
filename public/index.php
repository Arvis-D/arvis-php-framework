<?php

// $timeStart = microtime(true);
// $memStart = memory_get_usage();

require __DIR__ . '/../vendor/autoload.php';

use App\App;

$dotenv = \Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();
$container = require __DIR__ . '/../src/Config/container.php';

$app = new App($container['request'], $container, $container['dispatcher']);
$response = $app->handle();
$response->send();

// $memEnd = memory_get_usage();
// $timeEnd = microtime(true);
// $time = $timeEnd - $timeStart;
// $mem = $memEnd - $memStart;

// $_SESSION['performance']['memory'] = $mem / 1024;
// $_SESSION['performance']['time'] = round($time, 3);