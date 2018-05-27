<?php

return [
    'root_dir' => __DIR__ . "/../",
    'controllers_namespaces' => 'app\controllers\\',
    'templates_dir' => __DIR__ . "/../templates/",
  "TIME_MONTH" => time() + 60 * 60 * 24 * 30,
    'components' => [
        'db' => [
            'class' => \app\services\Db::class,
            'driver' => 'mysql',
            'host' => 'localhost',
            'login' => 'root',
            'password' => 'passdb987YK',
            'database' => 'dbslvprblm',
            'charset' => 'utf8'
        ],
        'request' => [
            'class' => \app\services\Request::class
        ],
        'mainController' => [
            'class' => \app\controllers\FrontController::class
        ]
    ]
];