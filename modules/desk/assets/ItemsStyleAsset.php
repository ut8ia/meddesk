<?php

namespace app\modules\desk\assets;

use yii\web\AssetBundle;

class ItemsStyleAsset extends AssetBundle
{


    public $sourcePath = '@app/modules/desk/assets';
    public $css = ['css/items.css'];
    public $js = [];
    public $depends = [
        'yii\bootstrap\BootstrapAsset',
    ];

}
