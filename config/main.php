<?php

$params = require(__DIR__ . '/params.php');

$config = [
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

        'fileStorage' => [
            'class' => 'yii2tech\filestorage\hub\Storage',
            'storages' => [
                'local_storage' => [
                    'class' => 'yii2tech\filestorage\local\Storage',
                    'basePath' => '@storage',
                    'baseUrl' => '@storageUrl/storage',
                    'filePermission' => 0775,
                    'buckets' => [
//                        'expert_images' => [
//                            'baseSubPath' => 'experts',
//                            'fileSubDirTemplate' => '{ext}/{^name}/{^^name}',
//                        ],
                    ]
                ]
            ]
        ],

        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => app\modules\desk\models\ExpertsIdentity::class,
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
        'expert' => [
            'class' => 'app\modules\desk\components\Expert'
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'enableStrictParsing' => false,
            'rules' => [
                '/' => 'site/index',
            ]
        ],
        'formatter' => [
            'class' => 'app\modules\desk\components\Formatter'
        ],
        'adminmenu' => [
            'class' => ut8ia\adminmenu\Adminmenu::class,
            'items' => [

                [
                    'name' => 'Мій кабінет',
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
                            'controller' => 'mystatistics',
                            'url' => 'index',
                            'name' => 'Моя статистика'
                        ],
                        [
                            'module' => 'desk',
                            'controller' => 'profile',
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
                            'name' => 'Шаблони розкладу'
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
                    'name' => 'Адміністратор',
                    'items' => [

                        [
                            'module' => 'desk',
                            'controller' => 'experts',
                            'url' => 'index',
                            'name' => 'Фахівці'
                        ],
                        [
                            'module' => 'desk',
                            'controller' => 'scheduleexceptiondays',
                            'url' => 'index',
                            'name' => 'Нерабочі дні'
                        ],
                    ]
                ],
                [
                    'name' => 'Налаштування',
                    'items' => [
                        [
                            'module' => 'desk',
                            'controller' => 'expertgroups',
                            'url' => 'index',
                            'name' => 'Групи фахівців'
                        ],
                        [
                            'module' => 'desk',
                            'controller' => 'diagnoses',
                            'url' => 'index',
                            'name' => 'Діагнози'
                        ],
                        [
                            'module' => 'desk',
                            'controller' => 'places',
                            'url' => 'index',
                            'name' => 'Місця прийому'
                        ],
                        [
                            'module' => 'desk',
                            'controller' => 'buildings',
                            'url' => 'index',
                            'name' => 'Будівлі'
                        ]
                    ]
                ],
                [
                    'name' => 'Статистика',
                    'items' => [
                        [
                            'module' => 'desk',
                            'controller' => 'statcommon',
                            'url' => 'index',
                            'name' => 'Загальна'
                        ],
                        [
                            'module' => 'desk',
                            'controller' => 'statexperts',
                            'url' => 'index',
                            'name' => 'По Фахівціям'
                        ],
                        [
                            'module' => 'desk',
                            'controller' => 'statpatients',
                            'url' => 'index',
                            'name' => 'По Пацієнтам'
                        ],

                    ]
                ],
                [
                    'name' => 'Технічний розділ',
                    'items' => [
                        [
                            'module' => 'desk',
                            'controller' => 'dev',
                            'url' => 'index',
                            'name' => 'Debug page'
                        ],
                        [
                            'module' => 'desk',
                            'controller' => 'techmeets',
                            'url' => 'index',
                            'name' => 'Приймання'
                        ],
                    ]
                ],

            ]
        ],
    ],
    'modules' => [
        'desk' => [
//            'class' => 'ut8ia\medicine\MedicineModule',
            'class' => 'app\modules\desk\MedicineModule',
//            'layoutPath' => '@vendor/ut8ia/yii2-medicine/views/layouts',
            'layoutPath' => '@app/modules/desk/views/layouts',
//            'partialsPath' => '@vendor/ut8ia/yii2-medicine/views/partials/',
            'partialsPath' => '@app/modules/desk/views/partials/',
            'layout' => 'adminlte',
            'formsConfig' => [
                'enableClientValidation' => true,
                'options' => ['class' => 'form-horizontal', 'style' => 'padding-left:0px;'],
                'fieldConfig' => [
                    'template' => '<div class="col-lg-2">{label}</div><div class="col-lg-10">{input}{error}</div>',
                    'labelOptions' => ['class' => 'form-label'],
                    'inputOptions' => ['class' => 'form-control'],
                ],
            ],
            'usersClass' => app\models\User::class,
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
