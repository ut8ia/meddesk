<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\desk\models\DiagnosesAppointments */

$this->title = Yii::t('app', 'Create Diagnoses Appointments');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Diagnoses Appointments'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="diagnoses-appointments-create">



    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
