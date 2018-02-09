<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\desk\models\DiagnosesAppointments */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Diagnoses Appointments',
]) . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Diagnoses Appointments'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="diagnoses-appointments-update">



    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
