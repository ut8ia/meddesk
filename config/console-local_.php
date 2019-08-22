<?php

Yii::setAlias('@storageUrl', 'http://desk');

return [
    'id' => 'meddesk',
    'name' => 'meddesk',
    'language' => 'uk_UA',
    'components' => [
        'db' => require(__DIR__ . '/db-local.php'),
        'time' => [
            'class' => 'ut8ia\medicine\components\Time',
            'timeZone' => 'Europe/Kiev',
            'dateFormat' => 'd.m.Y',
            'dateJsFormat' => 'dd.mm.yyyy',
            'datetimeFormat' => 'd.m.Y H:i',
            'datetimeFormatDb' => 'Y-m-d H:i:s'
        ],
    ],
];


