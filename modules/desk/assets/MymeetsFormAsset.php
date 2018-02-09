<?php

namespace app\modules\desk\assets;

use yii\web\AssetBundle;

class MymeetsFormAsset extends AssetBundle
{
    public $sourcePath = '@vendor/ut8ia/yii2-medicine/assets';
    public $css = [];
    public $js = ['js/MymeetsForm.js'];
    public $depends = [
        'yii\web\JqueryAsset',
    ];
}
