<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\desk\models\Diagnoses */

$this->title = Yii::t('app', 'Create Diagnoses');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Diagnoses'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="diagnoses-create">



    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
