<?php
use ut8ia\slacklog\SlackTarget;

$params = require(__DIR__ . '/params.php');

$config = [
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'components' => [
        'language' => 'uk-UA',
        'i18n' => [
            'translations' => [
                '*' => [
                    'class' => 'yii\i18n\DbMessageSource',
                    'db' => 'db',
                    'sourceLanguage' => 'en-US', // Developer language
                    'sourceMessageTable' => '{{%language_source}}',
                    'messageTable' => '{{%language_translate}}',
//                'cachingDuration' => 86400,
                'enableCaching' => false,
                ]
            ],
        ],
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
        'authManager' => [
            'class' => 'yii\rbac\DbManager',
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
            'flushInterval' => 1,
//            'traceLevel' => YII_DEBUG ? 3 : 0,
            'traceLevel' => 3,
            'targets' => [
                'file' => [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                    'exportInterval' => 1
                ],
                'slackErrors' => [
                    'class' => SlackTarget::class,
                    'enabled' => true,
                    'urlWebHook' => "https://hooks.slack.com/services/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",
                    'emoji' => ':bug:',
                    'botName' => 'Error bot',
                    'levels' => ['error'],
                ],
                'slackDebug' => [
                    'class' => SlackTarget::class,
                    'enabled' => true,
                    'botName' => 'Confirmation bot',
                    'categories' => [
                        'DEBUG'
                    ],
                    'urlWebHook' => "https://hooks.slack.com/services/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",
                    'emoji' => ':gear:',
                    'levels' => ['info'],
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
        'assetManager' => [
            'class' => 'yii\web\AssetManager',
            'forceCopy' => true,
        ],
    ],
    'modules' => [
        'desk' => [
            'class' => 'app\modules\desk\MedicineModule',
            'layoutPath' => '@app/modules/desk/views/layouts',
            'partialsPath' => '@app/modules/desk/views/partials/',
            'layout' => 'adminlte',
            'formsConfig' => [
//                'enableClientValidation' => true,
//                'options' => ['class' => 'form-horizontal', 'style' => 'padding-left:0px;'],
//                'fieldConfig' => [
//                    'template' => '<div class="col-lg-2">{label}</div><div class="col-lg-10">{input}{error}</div>',
//                    'labelOptions' => ['class' => 'form-label'],
//                    'inputOptions' => ['class' => 'form-control'],
//                ],
            ],
            'usersClass' => app\modules\desk\models\Experts::class,
        ],
        'translatemanager' => [
            'class' => 'lajax\translatemanager\Module',
            'roles' => ['@'],
            'root' => '@app',
            'scanRootParentDirectory' => false,
            'layout' => '@app/modules/desk/views/layouts/adminlte',
            'ignoredCategories' => ['yii'],
//            'allowedIPs' => ['127.0.0.1', '::1', '192.168.0.*', '192.168.83.1'],
            'allowedIPs' => ['*']
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
        'generators' => [ //here
            'crud' => [
                'class' => 'yii\gii\generators\crud\Generator',
                'templates' => [
                    'adminlte' => '@vendor/dmstr/yii2-adminlte-asset/gii/templates/crud/simple',
                ]
            ]
        ],
    ];
}

return $config;
