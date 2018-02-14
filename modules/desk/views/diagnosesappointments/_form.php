<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\desk\models\DiagnosesAppointments */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="diagnoses-appointments-form">

    <?php $form = ActiveForm::begin(Yii::$app->controller->module->formsConfig); ?>

    <?= $form->field($model, 'patient_id')->textInput() ?>

    <?= $form->field($model, 'expert_id')->textInput() ?>

    <?= $form->field($model, 'expert_group_id')->textInput() ?>

    <?= $form->field($model, 'diagnoses_id')->textInput() ?>

    <?= $form->field($model, 'appointment_type')->dropDownList([ 'main' => 'Main', 'additional' => 'Additional', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'date')->textInput() ?>

    <?= $form->field($model, 'text')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('desk', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
