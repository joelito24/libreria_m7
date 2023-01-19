<?php

// $dotenv=\Dotenv\Dotenv::createImmutable(__DIR__);
// $dotenv->load();

use App\Container;
use App\Database\DB;
use App\Database\Connection;
use App\Database\QueryBuilder;
use App\Session;

// acces a servei de configuració
Container::bind('config',require 'config.php'); 

//acces al servei de base de datos
// Container::bind('database',new DB(Connection::make(Container::get('config'))));
Container::bind('query',new QueryBuilder(Connection::make(Container::get('config'))));
    









