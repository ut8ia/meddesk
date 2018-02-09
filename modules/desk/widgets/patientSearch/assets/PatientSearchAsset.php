<?php

namespace app\modules\desk\widgets\patientSearch\assets;

use yii\web\AssetBundle;

class PatientSearchAsset extends AssetBundle
{
    public $sourcePath = '@app/modules/desk/widgets/patientSearch/assets';

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
