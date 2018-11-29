<?php
require 'vendor/autoload.php';
require 'DB.php';
$config = ['settings' => [
    'addContentLengthHeader' => true,
]];
$app = new \Slim\App($config);


include("api/main.php");
// Run app
$app->run();