<?php

$params = require(__DIR__ . '/params.php');

$config = [
    'id' => 'meddesk',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'components' => [
        'language' => 'uk_UA',
//        'i18n' => [
//            'translations' => [
//                '*' => [
//                    'class' => 'yii\i18n\PhpMessageSource',
//                    'basePath' => '@app/messages',
//                    'sourceLanguage' => 'en',
//                    'fileMap' => [
//                        //'main' => 'main.php',
//                    ],
//                ],
//            ],
//        ],
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
                '/' => 'site/index',
            ],
        ],
        'adminmenu' => [
            'class' => ut8ia\adminmenu\Adminmenu::class,
            'items' => [

                [
                    'name' => 'Прийом',
                    'items' => [
                        [
                            'module' => 'desk',
                            'controller' => 'mypatients',
                            'url' => 'index',
                            'name' => 'Мої пацієнти'
                        ],
                        [
                            'module' => 'desk',
                            'controller' => 'mymeets',
                            'url' => 'index',
                            'name' => 'Приймання'
                        ],
                        [
                            'module' => 'desk',
                            'controller' => 'myschedule',
                            'url' => 'index',
                            'name' => 'Розклад прийому'
                        ],
                        [
                            'module' => 'desk',
                            'controller' => 'myprofile',
                            'url' => 'index',
                            'name' => 'Мої налаштування'
                        ],
                    ]
                ],
                [
                    'name' => 'Реєстратура',
                    'items' => [
                        [
                            'module' => 'desk',
                            'controller' => 'patients',
                            'url' => 'index',
                            'name' => 'Пацієнти'
                        ],
                        [
                            'module' => 'desk',
                            'controller' => 'meets',
                            'url' => 'index',
                            'name' => 'Приймання'
                        ],
                        [
                            'module' => 'desk',
                            'controller' => 'schedule',
                            'url' => 'index',
                            'name' => 'Розклад прийому'
                        ],
                        [
                            'module' => 'desk',
                            'controller' => 'scheduletemplates',
                            'url' => 'index',
                            'name' => 'Шаблони'
                        ],
                    ]
                ],
                [
                    'name' => 'Курси реабілітації',
                    'items' => [
                        [
                            'module' => 'desk',
                            'controller' => 'courses',
                            'url' => 'index',
                            'name' => 'Курси реабілатції'
                        ],
                        [
                            'module' => 'desk',
                            'controller' => 'courseslist',
                            'url' => 'index',
                            'name' => 'Записи на курс'
                        ],
                        [
                            'module' => 'desk',
                            'controller' => 'excerpts',
                            'url' => 'index',
                            'name' => 'Виписки'
                        ],
                    ]
                ],
                [
                    'name' => 'Налаштування',
                    'items' => [
                        [
                            'module' => 'desk',
                            'controller' => 'scheduleexceptiondays',
                            'url' => 'index',
                            'name' => 'Дні-виключення'
                        ],
                        [
                            'module' => 'desk',
                            'controller' => 'expertgroups',
                            'url' => 'index',
                            'name' => 'Групи фахівців'
                        ],
                        [
                            'module' => 'desk',
                            'controller' => 'places',
                            'url' => 'index',
                            'name' => 'Місця прийому'
                        ],
                        [
                            'module' => 'desk',
                            'controller' => 'meettypes',
                            'url' => 'index',
                            'name' => 'Типи прийому'
                        ],
                    ]
                ],

            ]
        ],
    ],
    'modules' => [
        'desk' => [
            'class' => 'ut8ia\medicine\MedicineModule',
            'layoutPath' => '@app/views/layouts',
            'layout' => 'admin',
            'formsConfig'=>[
                'enableClientValidation' => true,
                'options' => ['class' => 'form-horizontal', 'style' => 'padding-left:0px;'],
                'fieldConfig' => [
                    'template' => '<div class="col-lg-2">{label}</div><div class="col-lg-10">{input}{error}</div>',
                    'labelOptions' => ['class' => 'form-label'],
                    'inputOptions' => ['class' => 'form-control'],
                ],
            ],
            'usersClass'=>app\models\User::class,
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
        'allowedIPs' => ['127.0.0.1', '81.22.138.96', '::1'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        'allowedIPs' => ['127.0.0.1', '81.22.138.96', '::1'],
    ];
}

return $config;
