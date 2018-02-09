<?php

namespace app\modules\desk\widgets\patientSearch\assets;

use yii\web\AssetBundle;

class PatientSearchAsset extends AssetBundle
{
    public $sourcePath = '@vendor/ut8ia/yii2-medicine/widgets/patientSearch/assets';

    public $css = [
    ];
    public $js = [
        'js/patientSearch.js',
    ];
    public $depends = [
        'yii\web\JqueryAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
