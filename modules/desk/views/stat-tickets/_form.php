<?php

use app\modules\desk\models\Diagnoses;
use app\modules\desk\models\Patients;
use app\modules\desk\models\Regions;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\modules\desk\widgets\patientSearch\PatientSearchWidget;
use app\modules\desk\widgets\expertSearch\ExpertSearchWidget;
use app\modules\desk\helpers\Converter;
use app\modules\desk\assets\StatTicketsFormAsset;
use kartik\widgets\DatePicker;

$expertGroups = isset($model->experts->expertGroups) ? Converter::formatSelector($model->experts->expertGroups) : [];
$expertPlaces = isset($model->experts->places) ? Converter::formatSelector($model->experts->places) : [];

StatTicketsFormAsset::register($this);

$form = ActiveForm::begin(Yii::$app->controller->module->formsConfig);

/* @var $this yii\web\View */
/* @var $model app\modules\desk\models\forms\StatTicketForm */
/* @var $form yii\widgets\ActiveForm */
?>

    <div class="row">
    <div class="col-lg-4">
        <div class="box box-success">
            <div class="box-body">
                <div class="row">
                    <div class="col-lg-12">

                        <?= PatientSearchWidget::widget([
                            'model' => $model,
                            'form' => $form
                        ])
                        ?>
                    </div>
                    <div class="col-lg-12">
                        <?= $form->field($model, 'surname')->textInput(); ?>
                    </div>
                    <div class="col-lg-12">
                        <?= $form->field($model, 'name')->textInput(); ?>
                    </div>
                    <div class="col-lg-8">
                        <?= $form->field($model, 'patronymic')->textInput(); ?>
                    </div>
                    <div class="col-lg-4">
                        <?= $form->field($model, 'sex')
                            ->dropDownList(Patients::getSexes(), ['prompt' => '']) ?>
                    </div>
                    <div class="col-lg-8">
                        <?= $form->field($model, 'birthdate')->widget(DatePicker::class, [
                            'type' => DatePicker::TYPE_INPUT,
                            'pluginOptions' => [
                                'format' => Yii::$app->time->dateJsFormat
                            ]
                        ]) ?>
                    </div>
                    <div class="col-lg-4">
                        <?= $form->field($model, 'card_number')->textInput(); ?>
                    </div>

                    <div class="col-lg-12">
                        <?= $form->field($model, 'address')->textInput(); ?>
                    </div>
                    <div class="col-lg-12">
                        <?= $form->field($model, 'region_id')->dropDownList(
                            Yii::$app->formatter->asPairs(
                                Regions::class,
                                null,
                                null,
                                ['view' => 'selector']),
                            ['prompt' => '']
                        ); ?>
                    </div>

                    <div class="col-lg-8">
                        <?= $form->field($model, 'phone')->textInput(); ?>
                    </div>
                    <div class="col-lg-4">
                        <?= $form->field($model, 'isFromCity')
                            ->dropDownList($model->former->findParam('isFromCity')->makeOptionsArray() )
                        ?>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-8">
        <div class="box box-success">
            <div class="box-body">
                <div class="row">
                    <div class="col-lg-4">
                        <?= ExpertSearchWidget::widget([
                            'model' => $model,
                            'form' => $form
                        ])
                        ?>
                    </div>

                    <div class="col-lg-4">
                        <?= $form->field($model, 'expert_group_id')->dropDownList($expertGroups); ?>
                    </div>

                    <div class="col-lg-4">
                        <?= $form->field($model, 'place_id')->dropDownList($expertPlaces); ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="box box-default">
            <div class="box-body">
                <div class="row">
                    <div class="col-lg-4">
                        <?= $form->field($model, 'time_from')->widget(DatePicker::class, [
                            'type' => DatePicker::TYPE_INPUT,
                            'pluginOptions' => [
                                'format' => Yii::$app->time->dateJsFormat
                            ]
                        ]) ?>
                    </div>
                    <div class="col-lg-2">
                        <?= $form->field($model, 'first_meet')->checkbox() ?>
                    </div>
                    <div class="col-lg-2">
                        <?= $form->field($model, 'first_meet_in_year')->checkbox() ?>
                    </div>

                    <div class="col-lg-4">
                        <?= $form->field($model, 'directedFrom')
                            ->dropDownList($model->former->findParam('directedFrom')->makeOptionsArray(), ['prompt' => '']) ?>
                    </div>


                    <div class="col-lg-8">
                        <?= $form->field($model, 'diagnose_id')->dropDownList(
                            Yii::$app->formatter->asPairs(
                                Diagnoses::class,
                                null,
                                null,
                                ['view' => 'selector']),
                            ['prompt' => '']
                        ); ?>
                    </div>
                    <div class="col-lg-4">
                        <?= $form->field($model, 'diagnoseEquality')
                            ->dropDownList(
                                $model->former->findParam('diagnoseEquality')->makeOptionsArray(),
                                ['prompt' => '']
                            ) ?>
                    </div>


                    <div class="col-lg-8">
                        <div class="col-lg-6">
                            <?= $form->field($model, 'meetReason')
                                ->dropDownList(
                                    $model->former->findParam('meetReason')->makeOptionsArray(),
                                    ['prompt' => '']
                                ) ?>
                        </div>

                        <div class="col-lg-6">
                            <?= $form->field($model, 'illState')
                                ->dropDownList(
                                    $model->former->findParam('illState')->makeOptionsArray(),
                                    ['prompt' => '']
                                ) ?>
                        </div>
                        <div class="col-lg-12">
                            <?= $form->field($model, 'comment')
                                ->textarea() ?>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <?= $form->field($model, 'ticketResult')
                            ->checkboxList(
                                $model->former->findParam('ticketResult')->makeOptionsArray(),
                                ['prompt' => '', 'separator' => '<br>']
                            ) ?>
                    </div>

                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-lg-10">
                            </div>
                            <div class="col-lg-2">
                                <br><?= Html::submitButton(Yii::t('desk', 'Save'), ['class' => 'btn btn-success']) ?>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

<?php ActiveForm::end(); ?>