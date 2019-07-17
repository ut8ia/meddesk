<?php

namespace app\modules\desk\assets;

use yii\web\AssetBundle;

class PatientsFormAsset extends AssetBundle
{
    public $sourcePath = '@app/modules/desk/assets';
    public $css = [];
    public $js = ['js/PatientsForm.js'];
    public $depends = [
        'yii\web\JqueryAsset',
    ];
}
