<?php

namespace app\modules\desk\assets;

use yii\web\AssetBundle;

class StatTicketsFormAsset extends AssetBundle
{
    public $sourcePath = '@app/modules/desk/assets';
    public $css = [];
    public $js = ['js/StatTicketsForm.js'];
    public $depends = [
        'yii\web\JqueryAsset',
    ];
}
