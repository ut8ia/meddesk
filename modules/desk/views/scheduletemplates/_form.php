<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\DatePicker;
use app\modules\desk\widgets\expertSearch\ExpertSearchWidget;

/* @var $this yii\web\View */
/* @var $model app\modules\desk\models\forms\ScheduleTemplatesForm */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="schedule-templates-form">

    <?php $form = ActiveForm::begin(Yii::$app->controller->module->formsConfig); ?>

    <?= ExpertSearchWidget::widget([
        'model' => $model,
        'form' => $form
    ])
    ?>

    <?= $form->field($model, 'expert_group_id')->dropDownList($model->getExpertGroupsSelector()) ?>

    <?= $form->field($model, 'place_id')->textInput() ?>

    <?= $form->field($model, 'week_day')->textInput() ?>

    <?= $form->field($model, 'time_from')->textInput() ?>

    <?= $form->field($model, 'time_to')->textInput() ?>

    <?= $form->field($model, 'comment')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
