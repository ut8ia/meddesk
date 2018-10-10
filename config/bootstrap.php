<?php

Yii::setAlias('common', dirname(__DIR__),'/common');
Yii::setAlias('@common', dirname(__DIR__),'/common');
Yii::setAlias('@console', dirname(dirname(__DIR__)) . '/console');
Yii::setAlias('app', dirname(__DIR__));
Yii::setAlias('@app', dirname(__DIR__));
Yii::setAlias('storage', dirname(__DIR__) . '/web/storage');
