<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use ut8ia\filemanager\widgets\TinyMce;
use kartik\widgets\Select2;
use kartik\widgets\FileInput;

/* @var $this yii\web\View */
/* @var $model app\modules\desk\models\Experts */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="experts-form">

    <?php $form = ActiveForm::begin(Yii::$app->controller->module->formsConfig); ?>


    <?= $form->field($model, 'surname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'patronymic')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'file')->widget(FileInput::class, [
        'options' => ['accept' => 'image/*'],
        'pluginOptions' => [
            'showRemove' => false,
            'showUpload' => false,
            'showClose' => false,
            'initialPreview' => [
                $model->getImageMain()
            ],
            'initialCaption' => false,
            'layoutTemplates' => [
                'actions' => ''
            ],
            'initialPreviewAsData' => true,
            'overwriteInitial' => true,
            'maxFileSize' => 2800
        ]
    ]); ?>

    <hr>

    <?= $form->field($model, 'short_info')->widget(TinyMce::class) ?>

    <?= $form->field($model, 'info')->widget(TinyMce::class) ?>

    <hr>

    <?= $form->field($model, 'places')->widget(Select2::class, [
        'data' => $availablePlaces,
        'language' => 'en',
        'options' => [
            'multiple' => true,
            'placeholder' => Yii::t('desk','Places of expert')
        ],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]);
    ?>

    <?= $form->field($model, 'expertGroups')->widget(Select2::class, [
        'data' => $availableExpertGroups,
        'language' => 'en',
        'options' => [
            'multiple' => true,
            'placeholder' => Yii::t('desk','Related to expert groups')
        ],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]);
    ?>

    <hr>

    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status')->dropDownList($model->getStatuses()) ?>

    <?= $form->field($model, 'newPassword')->passwordInput(['maxlength' => true]) ?>

    <hr>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('desk', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
