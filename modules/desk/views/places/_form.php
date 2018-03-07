<?php

use app\modules\desk\models\Buildings;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use kartik\widgets\DepDrop;

/* @var $this yii\web\View */
/* @var $model app\modules\desk\models\Places */
/* @var $form yii\widgets\ActiveForm */

$floors = isset($model->buildings)?$model->buildings->findFloors():[];
?>

<div class="box-body">

    <?php $form = ActiveForm::begin(Yii::$app->controller->module->formsConfig); ?>

    <?= $form->field($model, 'number')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'building_id')->dropDownList(
            Yii::$app->formatter->asPairs(Buildings::class)
    ) ?>

    <?= $form->field($model, 'floor')->widget(DepDrop::class, [
        'options' => ['id' => 'placesform-floor'],
        'data' => $floors,
        'pluginOptions' => [
            'depends' => ['placesform-building_id'],
            'placeholder' => 'Select...',
            'url' => Url::to(['buildings/floors'])
        ]
    ]);

    ?>

</div>
<div class="box-footer clearfix no-border">
    <div class="form-group">
        <?= Html::submitButton(Yii::t('desk', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
