<?php

//================================= ENVIRONMENT ==================================//
define('ENVIRONMENT', $_ENV['ENVIRONMENT'] ?? 'development');
define('DOMAIN', $_ENV['DOMAIN'] ?? 'http://localhost:8000');
//================================= PATHS ==================================//
define('PATH', [
    'ROOT'          => dirname(path:__FILE__, levels:2),
    'VIEW'          => dirname(path:__FILE__, levels:2) . '/app/views/',
    'CONTROLLER'    => dirname(path:__FILE__, levels:2) . '/app/controllers/',
    'ASSET'         => DOMAIN . '/assets/',
]);

//================================ DEFAULTS ================================//
define('DEFAULTS', [
    'PARTIALS_FOLDER'   => 'partials',
    'COMPONENTS_FOLDER' => 'components'
]);
  
//================================ DATABASE ================================//
define('DB', [
    'HOST'      => $_ENV['DB_HOST'],
    'PORT'      => $_ENV['DB_PORT'],
    'NAME'      => $_ENV['DB_NAME'],
    'USERNAME'  => $_ENV['DB_USERNAME'],
    'PASSWORD'  => $_ENV['DB_PASSWORD'],
    'OPTIONS'   => [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
    ]
]);