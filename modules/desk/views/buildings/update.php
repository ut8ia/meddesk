<?php

/* @var $this yii\web\View */
/* @var $model app\modules\desk\models\Buildings */

$this->title = Yii::t('desk', 'Update {modelClass}: ', [
    'modelClass' => 'Buildings',
]) . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('desk', 'Buildings'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('desk', 'Update');
$this->blocks['content-header'] =  Yii::t('desk', 'Buildings');
?>

<div class="box box-info">
    <div class="box-header with-border">
        <h3 class="box-title"></h3>
    </div>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
