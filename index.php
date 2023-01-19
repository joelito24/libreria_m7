<?php

ini_set('display_errors','On');

//set class autoload
require_once __DIR__.'/vendor/autoload.php';
require_once __DIR__.'/bootstrap.php';

use App\App;

new App();

// $uri = $_SERVER['REQUEST_URI'];

// print_r($uri);
