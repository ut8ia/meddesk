<?php

use app\modules\desk\models\Regions;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\modules\desk\models\Patients */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="row">

    <div class="col-lg-4">
        <div class="box box-info">
            <div class="box-body">

                <?php $form = ActiveForm::begin(Yii::$app->controller->module->formsConfig); ?>

                <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'surname')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'patronymic')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'card_number')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'sex')->dropDownList(['female' => 'Female', 'male' => 'Male',], ['prompt' => '']) ?>

                <?= $form->field($model, 'birthdate')->widget(DatePicker::class, [
                    'type' => DatePicker::TYPE_INPUT,
                    'pluginOptions' => [
                        'format' => Yii::$app->time->dateJsFormat
                    ]
                ]) ?>
            </div>
        </div>
    </div>
    <div class="col-lg-8">
        <div class="box box-info">
            <div class="box-body">
                <?= $form->field($model, 'phone')->textInput(); ?>
                <?= $form->field($model, 'city')->textInput(['maxlength' => true]) ?>
                <?= $form->field($model, 'address')->textInput(); ?>
                <?= $form->field($model, 'region_id')->dropDownList(
                    Yii::$app->formatter->asPairs(
                        Regions::class,
                        null,
                        null,
                        ['view' => 'selector']),
                    ['prompt' => '']
                ); ?>

                <?= $form->field($model, 'district')->textInput(['maxlength' => true]) ?>
                <?= $form->field($model, 'district_a')->textInput(['maxlength' => true]) ?>

                <?php
                //$form->field($model, 'user_id')->textInput()
                ?>

            </div>
            <div class="box-footer clearfix no-border">
                <div class="form-group">
                    <?= Html::submitButton(Yii::t('desk', 'Save'), ['class' => 'btn btn-success']) ?>
                </div>

                <?php ActiveForm::end(); ?>

            </div>

        </div>
    </div>
</div>