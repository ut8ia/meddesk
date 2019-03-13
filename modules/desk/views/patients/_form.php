<?php

use app\modules\desk\models\Cities;
use app\modules\desk\models\Regions;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\DatePicker;
use app\modules\desk\models\Patients;

$form = ActiveForm::begin(Yii::$app->controller->module->formsConfig);

/* @var $this yii\web\View */
/* @var $model app\modules\desk\models\Patients */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="row">

    <div class="col-lg-12">
        <div class="box box-info">
            <div class="box-body">
                <div class="row">
                    <div class="col-lg-4">
                        <?= $form->field($model, 'surname')->textInput(); ?>
                    </div>
                    <div class="col-lg-4">
                        <?= $form->field($model, 'name')->textInput(); ?>
                    </div>
                    <div class="col-lg-4">
                        <?= $form->field($model, 'patronymic')->textInput(); ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3">
                        <?= $form->field($model, 'sex')
                            ->dropDownList(Patients::getSexes(), ['prompt' => '']) ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <?= $form->field($model, 'birthdate')->widget(DatePicker::class, [
                            'type' => DatePicker::TYPE_INPUT,
                            'pluginOptions' => [
                                'format' => Yii::$app->time->dateJsFormat
                            ]
                        ]) ?>
                    </div>
                </div>
                <div class="row">

                    <div class="col-lg-4">
                        <?= $form->field($model, 'region_id')->dropDownList(
                            Yii::$app->formatter->asPairs(
                                Regions::class,
                                null,
                                null,
                                ['view' => 'selector']),
                            ['prompt' => '']
                        ); ?>
                    </div>

                    <div class="col-lg-4">
                        <?= $form->field($model, 'city_type')
                            ->dropDownList(Cities::getTypes())
                        ?>
                    </div>

                    <div class="col-lg-4">
                        <?= $form->field($model, 'city')->textInput(); ?>
                    </div>

                    <div class="col-lg-8">
                        <?= $form->field($model, 'address')->textInput(); ?>
                    </div>

                    <div class="col-lg-4">
                        <?= $form->field($model, 'phone')->textInput(); ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <?= $form->field($model, 'email')->input('email'); ?>
                    </div>
                    <div class="col-lg-6"></div>

                    <div class="col-lg-2"><br>
                        <?= Html::submitButton(Yii::t('desk', 'Save'), ['class' => 'btn btn-success']) ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!--    <div class="col-lg-4">-->
<!--        <div class="box box-info">-->
<!--            <div class="box-body">-->
<!--            </div>-->
<!--            <div class="box-footer clearfix no-border">-->
<!--                <div class="form-group">-->
<!--                </div>-->
<!--                -->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
    <?php ActiveForm::end(); ?>
</div>