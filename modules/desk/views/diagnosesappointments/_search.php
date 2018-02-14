<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\desk\models\search\DiagnosesAppointmentsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="diagnoses-appointments-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'patient_id') ?>

    <?= $form->field($model, 'expert_id') ?>

    <?= $form->field($model, 'expert_group_id') ?>

    <?= $form->field($model, 'diagnoses_id') ?>

    <?php // echo $form->field($model, 'appointment_type') ?>

    <?php // echo $form->field($model, 'date') ?>

    <?php // echo $form->field($model, 'text') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('desk', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('desk', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
