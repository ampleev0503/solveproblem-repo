<?php

return [
    'root_dir' => __DIR__ . "/../",
    'controllers_namespaces' => 'app\controllers\\',
    'templates_dir' => __DIR__ . "/../templates/",
    'components' => [
        'db' => [
            'class' => \app\services\Db::class,
            'driver' => 'mysql',
            'host' => 'localhost',
            'login' => 'vadim',
            'password' => 'passdb987JL',
            'database' => 'dbslvprblm',
            'charset' => 'UTF8'
        ],
        'request' => [
            'class' => \app\services\Request::class
        ],
        'mainController' => [
            'class' => \app\controllers\FrontController::class
        ]
    ]
];