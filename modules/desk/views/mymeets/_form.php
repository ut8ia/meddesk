<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\modules\desk\widgets\patientSearch\PatientSearchWidget;
use app\modules\desk\widgets\expertSearch\ExpertSearchWidget;
use kartik\widgets\DateTimePicker;
use app\modules\desk\helpers\Converter;
use app\modules\desk\assets\MymeetsFormAsset;

$expertGroups = isset($model->experts->expertGroups) ? Converter::formatSelector($model->experts->expertGroups) : [];
$expertPlaces = isset($model->experts->places) ? Converter::formatSelector($model->experts->places) : [];

MymeetsFormAsset::register($this);

/* @var $this yii\web\View */
/* @var $model app\modules\desk\models\forms\MymeetsForm */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="meets-form">

    <?php $form = ActiveForm::begin(Yii::$app->controller->module->formsConfig); ?>


    <?= PatientSearchWidget::widget([
        'model' => $model,
        'form' => $form
    ])
    ?>
    <hr>

    <?= $form->field($model, 'plan_from')->Widget(DateTimePicker::class, [
        'pluginOptions' => [
            'todayHighlight' => true,
            'todayBtn' => true,
            'format' => Yii::$app->time->datetimeJsFormat
        ]
    ]) ?>
    <hr>

    <?= ExpertSearchWidget::widget([
        'model' => $model,
        'form' => $form
    ])
    ?>

    <?= $form->field($model, 'expert_group_id')->dropDownList($expertGroups); ?>

    <?= $form->field($model, 'place_id')->dropDownList($expertPlaces); ?>

    <?= $form->field($model, 'status')->dropDownList($model->getStatuses()) ?>

    <?= $form->field($model, 'meet_type')->dropDownList($model->getMeetTypesSelector()) ?>

    <?= $form->field($model, 'comment')->textInput(['maxlength' => true]) ?>


    <div class="form-group">
        <?= Html::submitButton(Yii::t('desk', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
