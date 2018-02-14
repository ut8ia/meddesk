<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\DatePicker;
use app\modules\desk\widgets\patientSearch\PatientSearchWidget;
use app\modules\desk\models\Courses;

/* @var $this yii\web\View */
/* @var $model app\modules\desk\models\forms\CoursesListForm */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="courses-list-form">

    <?php $form = ActiveForm::begin(Yii::$app->controller->module->formsConfig); ?>

    <?= $form->field($model, 'course_id')->dropDownList(
        Yii::$app->formatter->asPairs(
            Courses::class,
            ['status' => [Courses::STATUS_OPEN, Courses::STATUS_PENDING]],
            'id',
            ['view' => 'selector'])
    );
    ?>

    <?= PatientSearchWidget::widget([
        'model' => $model,
        'form' => $form
    ])
    ?>

    <?= $form->field($model, 'status')->dropDownList($model::getStatuses()) ?>

    <?= $form->field($model, 'date_from')->widget(DatePicker::class, [
        'type' => DatePicker::TYPE_INPUT,
        'pluginOptions' => [
            'format' => Yii::$app->time->dateJsFormat
        ]
    ]) ?>

    <?= $form->field($model, 'date_to')->widget(DatePicker::class, [
        'type' => DatePicker::TYPE_INPUT,
        'pluginOptions' => [
            'format' => Yii::$app->time->dateJsFormat
        ]
    ]) ?>

    <?= $form->field($model, 'comment')->textarea(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('desk', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
