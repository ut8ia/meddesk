<?php
use yii\jui\AutoComplete;
use yii\web\JsExpression;
use app\modules\desk\widgets\expertSearch\assets\ExpertSearchAsset;

ExpertSearchAsset::register($this);

?>

<?= $form->field($model, 'expert_id', ['template' => '{input}', 'options' => ['style' => 'visibility:hidden;']])
    ->hiddenInput(['class' => 'expert_id_value'])->label(false) ?>

<?= $form->field($model, 'expert_name')->widget(AutoComplete::class, [
    'clientOptions' => [
        'source' => new JsExpression('function (request,response){ window.expertSearch.requestAutocomplete(request, response); }'),
        'delay' => 700,
        'select' => new JsExpression('function (a,b){ window.expertSearch.selectItem(a, b); }'),
    ],
    'options' => [
        'readonly' => false,
        'value' => $model->expert_name,
        'class' => 'form-control',
        'placeholder' => Yii::t('desk', 'Search expert name'),
    ],
]) ?>