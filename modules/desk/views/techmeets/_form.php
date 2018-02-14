<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\modules\desk\widgets\patientSearch\PatientSearchWidget;
use app\modules\desk\widgets\expertSearch\ExpertSearchWidget;
use kartik\widgets\DateTimePicker;
use kartik\widgets\DatePicker;
/* @var $this yii\web\View */
/* @var $model app\modules\desk\models\forms\MeetsForm */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="meets-form">

    <?php $form = ActiveForm::begin(Yii::$app->controller->module->formsConfig); ?>

    <?= ExpertSearchWidget::widget([
        'model' => $model,
        'form' => $form
    ])
    ?>

    <?= $form->field($model, 'expert_group_id')->textInput() ?>

    <?= PatientSearchWidget::widget([
        'model' => $model,
        'form' => $form
    ])
    ?>

    <?= $form->field($model, 'place_id')->textInput() ?>

    <?= $form->field($model, 'course_id')->textInput() ?>

    <?= $form->field($model, 'status')->dropDownList(['planned' => 'Planned', 'done' => 'Done', 'rejected' => 'Rejected',], ['prompt' => '']) ?>

    <?= $form->field($model, 'meet_type')->textInput() ?>

    <?= $form->field($model, 'for_excerpt')->textInput() ?>

    <?= $form->field($model, 'text')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'comment')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'plan_from')->Widget(DateTimePicker::class, [
        'pluginOptions' => [
            'todayHighlight' => true,
            'todayBtn' => true,
            'format' => Yii::$app->time->datetimeJsFormat
        ]
    ]) ?>

    <?= $form->field($model, 'plan_to')->Widget(DateTimePicker::class, [
        'pluginOptions' => [
            'todayHighlight' => true,
            'todayBtn' => true,
            'format' => Yii::$app->time->datetimeJsFormat
        ]
    ]) ?>


    <?= $form->field($model, 'time_from')->Widget(DateTimePicker::class, [
        'pluginOptions' => [
            'todayHighlight' => true,
            'todayBtn' => true,
            'format' => Yii::$app->time->datetimeJsFormat
        ]
    ]) ?>

    <?= $form->field($model, 'time_to')->Widget(DateTimePicker::class, [
        'pluginOptions' => [
            'todayHighlight' => true,
            'todayBtn' => true,
            'format' => Yii::$app->time->datetimeJsFormat
        ]
    ]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('desk', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
