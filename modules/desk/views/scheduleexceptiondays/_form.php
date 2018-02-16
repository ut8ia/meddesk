<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\modules\desk\models\ScheduleExceptionDays */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="box-body">

    <?php $form = ActiveForm::begin(Yii::$app->controller->module->formsConfig); ?>

    <?= $form->field($model, 'date')->widget(DatePicker::class, [
        'type' => DatePicker::TYPE_INPUT,
        'pluginOptions' => [
            'format' => Yii::$app->time->dateJsFormat
        ]
    ])
    ?>

    <?= $form->field($model, 'comment')->textInput(['maxlength' => true]) ?>

</div>
<div class="box-footer clearfix no-border">
    <div class="form-group">
        <?= Html::submitButton(Yii::t('desk', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
