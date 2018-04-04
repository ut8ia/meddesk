<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\modules\desk\widgets\patientSearch\PatientSearchWidget;
use app\modules\desk\widgets\expertSearch\ExpertSearchWidget;
use kartik\widgets\DateTimePicker;
use app\modules\desk\helpers\Converter;
use app\modules\desk\assets\MeetsFormAsset;

$expertGroups = isset($model->experts->expertGroups) ? Converter::formatSelector($model->experts->expertGroups) : [];
$expertPlaces = isset($model->experts->places) ? Converter::formatSelector($model->experts->places) : [];

MeetsFormAsset::register($this);

/* @var $this yii\web\View */
/* @var $model app\modules\desk\models\forms\MeetsForm */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="box-body">

    <?php $form = ActiveForm::begin(Yii::$app->controller->module->formsConfig); ?>


    <?= PatientSearchWidget::widget([
        'model' => $model,
        'form' => $form
    ])
    ?>

    <hr>

    <?= ExpertSearchWidget::widget([
        'model' => $model,
        'form' => $form
    ])
    ?>

    <?= $form->field($model, 'expert_group_id')->dropDownList($expertGroups); ?>

    <?= $form->field($model, 'place_id')->dropDownList($expertPlaces); ?>

    <hr>

    <?= $form->field($model, 'plan_from')->widget(DateTimePicker::class, [
        'pluginOptions' => [
            'todayHighlight' => true,
            'todayBtn' => true,
            'format' => Yii::$app->time->datetimeJsFormat
        ]
    ]) ?>

    <?= $form->field($model, 'status')->dropDownList($model->getStatuses()) ?>

    <?= $form->field($model, 'meet_type')->dropDownList($model->getMeetTypesSelector()) ?>

    <hr>
    <?= $form->field($model, 'comment')->textInput(['maxlength' => true]) ?>

</div>
<div class="box-footer clearfix no-border">
    <div class="form-group">
        <?= Html::submitButton(Yii::t('desk', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

