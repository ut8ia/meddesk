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

<?php $form = ActiveForm::begin(Yii::$app->controller->module->formsConfig); ?>

<div class="box-body">
    <div class="row">
        <div class="col-lg-4">

            <?= PatientSearchWidget::widget([
                'model' => $model,
                'form' => $form
            ])
            ?>
        </div>
        <div class="col-lg-4">
            <?= ExpertSearchWidget::widget([
                'model' => $model,
                'form' => $form
            ])
            ?>
        </div>
        <div class="col-lg-2">
            <?= $form->field($model, 'expert_group_id')->dropDownList($expertGroups); ?>
        </div>
        <div class="col-lg-2">
            <?= $form->field($model, 'place_id')->dropDownList($expertPlaces); ?>
        </div>
    </div>
    
    <div class="row">
        <div class="col-lg-4">
            <?= $form->field($model, 'plan_from')->widget(DateTimePicker::class, [
                'pluginOptions' => [
                    'todayHighlight' => true,
                    'todayBtn' => true,
                    'format' => Yii::$app->time->datetimeJsFormat
                ]
            ]) ?>
        </div>
        <div class="col-lg-4"><?= $form->field($model, 'meet_type')->dropDownList($model->getMeetTypesSelector()) ?></div>
        <div class="col-lg-4"><?= $form->field($model, 'status')->dropDownList($model->getStatuses()) ?></div>
    </div>

    <div class="row">
        <div class="col-lg-10"><?= $form->field($model, 'comment')->textInput(['maxlength' => true]) ?></div>
        <div class="col-lg-2"><br><?= Html::submitButton(Yii::t('desk', 'Save'), ['class' => 'btn btn-success']) ?></div>
    </div>


</div>
<?php ActiveForm::end(); ?>



