<?php

use app\modules\desk\models\ExpertGroups;
use app\modules\desk\models\Places;
use app\modules\desk\widgets\expertSearch\ExpertSearchWidget;
use app\modules\desk\widgets\patientSearch\PatientSearchWidget;
use kartik\widgets\DateTimePicker;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\desk\models\search\MeetsSearch */
/* @var $form yii\widgets\ActiveForm */
?>


<div class="box box-info">
<!--    <div class="box-header with-border">-->
<!--        <h3 class="box-title">--><?//= Yii::t('panel', 'Report filter'); ?><!--</h3>-->
<!--    </div>-->
    <div class="box-body">
        <div class="row">

            <?php $form = ActiveForm::begin([
                'action' => ['index'],
                'method' => 'get',
                'options' => [
                    'data-pjax' => 1
                ],
            ]); ?>

            <div class="col-lg-2">
                <?= ExpertSearchWidget::widget([
                    'model' => $model,
                    'form' => $form
                ])
                ?>
            </div>

            <div class="col-lg-2">
                <?= $form->field($model, 'expert_group_id')->dropDownList(
                    Yii::$app->formatter->asObjectPairs(
                        ExpertGroups::find()->orderBy('name')->all()),
                    ['prompt' => '']
                ); ?>
            </div>

            <div class="col-lg-2">
                <?= PatientSearchWidget::widget([
                    'model' => $model,
                    'form' => $form
                ])
                ?>
            </div>

            <div class="col-lg-2">
                <?= $form->field($model, 'place_id')->dropDownList(
                    Yii::$app->formatter->asObjectPairs(
                        Places::find()->orderBy('number')->all(),
                        null,
                        ['view' => 'selector']),
                    ['prompt' => '']
                ); ?>
            </div>
            <div class="col-lg-2">
                <?= $form->field($model, 'time_from')->widget(DateTimePicker::class, [
                    'pluginOptions' => [
                        'todayHighlight' => true,
                        'todayBtn' => true,
                        'format' => Yii::$app->time->datetimeJsFormat
                    ]
                ]) ?>
            </div>
            <div class="col-lg-2">
                <?= $form->field($model, 'time_filter_to')->widget(DateTimePicker::class, [
                    'pluginOptions' => [
                        'todayHighlight' => true,
                        'todayBtn' => true,
                        'format' => Yii::$app->time->datetimeJsFormat
                    ]
                ]) ?>
            </div>
            <?php // echo $form->field($model, 'place_id') ?>

            <?php // echo $form->field($model, 'course_id') ?>

            <?php // echo $form->field($model, 'status') ?>

            <?php // echo $form->field($model, 'meet_type') ?>

            <?php // echo $form->field($model, 'for_excerpt') ?>

            <?php // echo $form->field($model, 'text') ?>

            <?php // echo $form->field($model, 'comment') ?>

            <?php // echo $form->field($model, 'time_from') ?>

            <?php // echo $form->field($model, 'time_to') ?>
        </div>
    </div>
    <div class=" box-footer form-group">
        <?= Html::submitButton(Yii::t('desk', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('desk', 'Reset'), ['/desk/stat-tickets/index'], ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
