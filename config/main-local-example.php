<?php

Yii::setAlias('@storageUrl', 'https://desk');

return [
    'id' => 'meddesk',
    'name' => 'meddesk',
    'language' => 'uk_UA',
    'components' => [
        'db' => require(__DIR__ . '/db-local.php'),
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => '123412341234234',
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
