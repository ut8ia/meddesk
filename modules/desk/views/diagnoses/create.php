<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\desk\models\Diagnoses */

$this->title = Yii::t('desk', 'Create Diagnoses');
$this->params['breadcrumbs'][] = ['label' => Yii::t('desk', 'Diagnoses'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="diagnoses-create">



    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
