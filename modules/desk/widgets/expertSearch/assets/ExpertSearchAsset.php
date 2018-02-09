<?php

namespace app\modules\desk\widgets\expertSearch\assets;

use yii\web\AssetBundle;

class ExpertSearchAsset extends AssetBundle
{
    public $sourcePath = '@vendor/ut8ia/yii2-medicine/widgets/expertSearch/assets';

    public $css = [
    ];
    public $js = [
        'js/expertSearch.js',
    ];
    public $depends = [
        'yii\web\JqueryAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
