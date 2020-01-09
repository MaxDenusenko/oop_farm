<?php

/**
 * Composer
 */
require  __DIR__ . '/vendor/autoload.php';

$config = require(__DIR__ . '/config/main.php');

$app = \App\Base\Application::getInstance($config);
$app->run();
