<?php
require_once BASEPATH . 'dotenv/autoloader.php';
$dotenv = new Dotenv\Dotenv(FCPATH);
$dotenv->load();
return [
    'adapter' => [
        'driver' => getenv('DB_CONNECTION_GC'),
        'database' => getenv('DB_DATABASE'),
        'username' => getenv('DB_USERNAME'),
        'password' => getenv('DB_PASSWORD'),
        'hostname' => getenv('DB_HOST'),
        'charset' => 'utf8'
    ]
];


// return [
//     'adapter' => [
//         'driver' => 'Pdo_Mysql',
//         'database' => 'jenkins',
//         'username' => 'root',
//         'password' => '',
//         'hostname' => 'localhost',
//         'charset' => 'utf8'
//     ]
// ];
