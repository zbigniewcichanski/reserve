<?php

require realpath(__DIR__ . '/../../vendor/autoload.php');

$env = new \Dotenv\Dotenv(realpath(__DIR__ . '/../'));
$env->load();