<?php

$params = require(__DIR__ . '/params.php');

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => '2345gtrerbty45tf',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],

        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'enableStrictParsing' => false,
            'rules' => [
            ],
        ],
        'adminmenu' => [
            'class' => ut8ia\adminmenu\Adminmenu::class,
            'items' => [
                0 => [
                    'name' => 'Весь контент',
                    'items' => [
                        1 => [
                            'module' => 'content',
                            'controller' => 'content',
                            'url' => 'index',
                            'name' => 'Контент'],
                        2 => [
                            'module' => 'content',
                            'controller' => 'tags',
                            'name' => 'Теги',
                            'url' => 'index'],
                        3 => [
                            'module' => 'content',
                            'controller' => 'contentrubrics',
                            'name' => 'Рубріки',
                            'url' => 'index'],
                        4 => [
                            'module' => 'content',
                            'controller' => 'contentsections',
                            'name' => 'Секції',
                            'url' => 'index']
                    ]
                ],
                3 => [
                    'name' => 'Інтерфейс сайта',
                    'items' => [
                        1 => [
                            'module' => 'frontinterface',
                            'controller' => 'records',
                            'url' => 'index',
                            'name' => 'Частинки'],
                        2 => [
                            'module' => 'frontinterface',
                            'controller' => 'rubrics',
                            'url' => 'index',
                            'name' => 'Рубріки']
                    ]
                ],
                4 => [
                    'name' => 'Quality',
                    'items' => [
                        1 => [
                            'module' => 'qualityadmin',
                            'controller' => 'records',
                            'url' => 'index',
                            'name' => 'Quality items'],
                        2 => [
                            'module' => 'qualityadmin',
                            'controller' => 'rubrics',
                            'url' => 'index',
                            'name' => 'quality rubrics']
                    ]
                ],
                5 => [
                    'name' => 'Methods',
                    'items' => [
                        1 => [
                            'module' => 'methodsadmin',
                            'controller' => 'records',
                            'url' => 'index',
                            'name' => 'Methods items'],
                        2 => [
                            'module' => 'methodsadmin',
                            'controller' => 'rubrics',
                            'url' => 'index',
                            'name' => 'methods rubrics']
                    ]
                ],
                8 => [
                    'name' => 'Лента',
                    'items' => [
                        1 => [
                            'module' => 'infoadmin',
                            'controller' => 'records',
                            'url' => 'index',
                            'name' => 'Материали'],
                        2 => [
                            'module' => 'infoadmin',
                            'controller' => 'rubrics',
                            'url' => 'index',
                            'name' => 'Рубрики']
                    ]
                ]
            ]
        ],
    ],
    'modules'=>[
        'desk' => [
            'class' => 'ut8ia\medicine\MedicineModule',
            'layoutPath' => '@app/views/layouts',
            'layout' => 'admin'
        ],
    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        'allowedIPs' => ['127.0.0.1','81.22.138.96', '::1'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        'allowedIPs' => ['127.0.0.1','81.22.138.96', '::1'],
    ];
}

return $config;
