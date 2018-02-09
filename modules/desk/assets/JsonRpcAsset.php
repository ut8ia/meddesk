<?php

namespace app\modules\desk\assets;

use yii\web\AssetBundle;

class JsonRpcAsset extends AssetBundle
{
    public $sourcePath = '@app/modules/desk/assets';
    public $css = [];
    public $js = ['js/JsonRpcWrapper.js'];
}
