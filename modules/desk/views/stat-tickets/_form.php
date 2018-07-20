<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\modules\desk\widgets\patientSearch\PatientSearchWidget;
use app\modules\desk\widgets\expertSearch\ExpertSearchWidget;
use kartik\widgets\DateTimePicker;
use app\modules\desk\helpers\Converter;
use app\modules\desk\assets\StatTicketsFormAsset;
use kartik\widgets\DatePicker;

$expertGroups = isset($model->experts->expertGroups) ? Converter::formatSelector($model->experts->expertGroups) : [];
$expertPlaces = isset($model->experts->places) ? Converter::formatSelector($model->experts->places) : [];

StatTicketsFormAsset::register($this);

/* @var $this yii\web\View */
/* @var $model app\modules\desk\models\forms\MeetsForm */
/* @var $form yii\widgets\ActiveForm */
?>

<?php $form = ActiveForm::begin(Yii::$app->controller->module->formsConfig); ?>

<div class="box-body">
    <div class="row">
        <div class="col-lg-3"></div>
        <div class="col-lg-6">


            <div class="row">
                <div class="col-lg-8">
                    <?= ExpertSearchWidget::widget([
                        'model' => $model,
                        'form' => $form
                    ])
                    ?>
                </div>

                <div class="col-lg-4">
                    <?= $form->field($model, 'expert_group_id')->dropDownList($expertGroups); ?>
                </div>


                <div class="col-lg-12">
                    <?= $form->field($model, 'place_id')->dropDownList($expertPlaces); ?>
                </div>


                <div class="col-lg-12">

                    <?= PatientSearchWidget::widget([
                        'model' => $model,
                        'form' => $form
                    ])
                    ?>
                </div>

            </div>
            <div class="row">
                <div class="col-lg-12">
                    <?= $form->field($model, 'name')->textInput(); ?>
                    <?= $form->field($model, 'surname')->textInput(); ?>
                    <?= $form->field($model, 'patronymic')->textInput(); ?>
                    <?= $form->field($model, 'card_number')->textInput(); ?>
                    <?= $form->field($model, 'birthdate')->widget(DatePicker::class, [
                        'type' => DatePicker::TYPE_INPUT,
                        'pluginOptions' => [
                            'format' => Yii::$app->time->dateJsFormat
                        ]
                    ]) ?>
                    <?= $form->field($model, 'sex')->dropDownList(['female' => 'Female', 'male' => 'Male',], ['prompt' => '']) ?>
                    <?= $form->field($model, 'address')->textInput(); ?>
                </div>
            </div>


            <div class="row">
                <div class="col-lg-2">
                    <br><?= Html::submitButton(Yii::t('desk', 'Save'), ['class' => 'btn btn-success']) ?></div>
            </div>

        </div>

        <div class="col-lg-3"></div>

    </div>
</div>
<?php ActiveForm::end(); ?>