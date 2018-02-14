<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\ColorInput;

/* @var $this yii\web\View */
/* @var $model app\modules\desk\models\ExpertGroups */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="expert-groups-form">

    <?php $form = ActiveForm::begin(Yii::$app->controller->module->formsConfig); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'patient_required')->checkbox() ?>

    <?= $form->field($model, 'course_required')->checkbox() ?>

    <?= $form->field($model, 'excerpt_required')->checkbox() ?>

    <?= $form->field($model, 'excerpt_order')->textInput() ?>

    <?= $form->field($model, 'display_color')->widget(ColorInput::class,
        [
            'options' => ['placeholder' => 'Select color ...']
        ]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('desk', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
