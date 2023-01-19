<?php 

return[
  'dbuser'=>$_ENV['DB_USER'],
  'dbpassword'=>$_ENV['DB_PASSWORD'],   //el profe ha puesto dbpasword
  'dbname'=>$_ENV['DB_NAME'],
  'connection'=>$_ENV['DB_DRIVER'].':host='.$_ENV['DB_HOST'],
  'options'=>[
    \PDO::ATTR_ERRMODE=>\PDO::ERRMODE_EXCEPTION
  ],
];