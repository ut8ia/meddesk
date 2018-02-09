<?php

namespace app\modules\desk\assets;

use yii\web\AssetBundle;

class JsonRpcAsset extends AssetBundle
{
    public $sourcePath = '@vendor/ut8ia/yii2-medicine/assets';
    public $css = [];
    public $js = ['js/JsonRpcWrapper.js'];
}
