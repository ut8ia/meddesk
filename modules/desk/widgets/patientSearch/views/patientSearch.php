<?php
use yii\jui\AutoComplete;
use yii\web\JsExpression;
use app\modules\desk\widgets\patientSearch\assets\PatientSearchAsset;

PatientSearchAsset::register($this);

?>

<?= $form->field($model, 'patient_id', ['template' => '{input}', 'options' => ['style' => 'visibility:hidden;']])
    ->hiddenInput(['class' => 'patient_id_value'])->label(false) ?>

<?= $form->field($model, 'patient_name')->widget(AutoComplete::class, [
    'clientOptions' => [
        'source' => new JsExpression('function (request,response){ window.patientSearch.requestAutocomplete(request, response); }'),
        'delay' => 700,
        'select' => new JsExpression('function (a,b){ window.patientSearch.selectItem(a, b); }'),
    ],
    'options' => [
        'readonly' => false,
        'value' => $model->patient_name,
        'class' => 'form-control',
        'placeholder' => Yii::t('app', 'Search patient name'),
    ],
]) ?>