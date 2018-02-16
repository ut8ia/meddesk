<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\modules\desk\models\Courses */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="box-body">

    <?php $form = ActiveForm::begin(Yii::$app->controller->module->formsConfig); ?>

    <?= $form->field($model, 'number')->textInput() ?>

    <?= $form->field($model, 'date_start')->widget(DatePicker::class, [
        'type' => DatePicker::TYPE_INPUT,
        'pluginOptions' => [
            'format' => Yii::$app->time->dateJsFormat
        ]
    ]) ?>

    <?= $form->field($model, 'date_end')->widget(DatePicker::class, [
        'type' => DatePicker::TYPE_INPUT,
        'pluginOptions' => [
            'format' => Yii::$app->time->dateJsFormat
        ]
    ]) ?>

    <?= $form->field($model, 'status')->dropDownList($model->getStatuses()); ?>

</div>
<div class="box-footer clearfix no-border">
    <div class="form-group">
        <?= Html::submitButton(Yii::t('desk', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>