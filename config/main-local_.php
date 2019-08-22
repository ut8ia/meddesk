<?php
use ut8ia\slacklog\SlackTarget;
Yii::setAlias('@storageUrl', 'http://desk');

return [
    'id' => 'meddesk',
    'name' => 'meddesk local',
    'language' => 'uk-UA',
    'components' => [
        'db' => require(__DIR__ . '/db-local.php'),
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => '2345gtrerbty45tf',
        ],
        'log' => [
            'flushInterval' => 3,
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
        'time' => [
            'class' => 'app\modules\desk\components\Time',
            'timeZone' => 'Europe/Kiev',
            'dateFormat' => 'd.m.Y',
            'dateJsFormat' => 'dd.mm.yyyy',
            'datetimeFormat' => 'd.m.Y H:i',
            'datetimeFormatDb' => 'Y-m-d H:i:s'
        ],
    ],

];
