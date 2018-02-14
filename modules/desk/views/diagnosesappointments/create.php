<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\desk\models\DiagnosesAppointments */

$this->title = Yii::t('desk', 'Create Diagnoses Appointments');
$this->params['breadcrumbs'][] = ['label' => Yii::t('desk', 'Diagnoses Appointments'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="diagnoses-appointments-create">



    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
