<?php

namespace app\modules\desk\assets;

use yii\web\AssetBundle;

class CommonFormsAsset extends AssetBundle
{
    public $sourcePath = '@app/modules/desk/assets';
    public $css = ['css/commonforms.css'];
    public $js = [];
    public $depends = [
        'yii\bootstrap\BootstrapAsset',
    ];
}
