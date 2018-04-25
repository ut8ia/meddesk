<?php

namespace app\modules\desk\assets;

use yii\web\AssetBundle;


class AdminAppAsset extends AssetBundle
{
    public $sourcePath = '@app/modules/desk/assets';
    public $css = ['css/admin.css'];
    public $js = [];

    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
