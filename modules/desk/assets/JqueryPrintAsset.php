<?php

namespace app\modules\desk\assets;

use yii\web\AssetBundle;

class JqueryPrintAsset extends AssetBundle
{
    public $sourcePath = '@app/modules/desk/assets';
    public $css = ['css/print.css'];
    public $js = ['js/Jquery.print.js'];
    public $depends = [
        'yii\web\JqueryAsset',
    ];
}
