<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\desk\models\DiagnosesAppointments */

$this->title = Yii::t('desk', 'Update {modelClass}: ', [
    'modelClass' => 'Diagnoses Appointments',
]) . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('desk', 'Diagnoses Appointments'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('desk', 'Update');
?>
<div class="diagnoses-appointments-update">



    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
