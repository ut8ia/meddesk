<?php

namespace app\modules\desk\assets;

use yii\web\AssetBundle;

class MeetsFormAsset extends AssetBundle
{
    public $sourcePath = '@vendor/ut8ia/yii2-medicine/assets';
    public $css = [];
    public $js = ['js/MeetsForm.js'];
    public $depends = [
        'yii\web\JqueryAsset',
    ];
}
