<?php

/* @var $this yii\web\View */
/* @var $model app\modules\desk\models\ExpertGroups */

$this->title = Yii::t('desk', 'Update {modelClass}: ', [
    'modelClass' => 'Expert Groups',
]) . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('desk', 'Expert Groups'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('desk', 'Update');
$this->blocks['content-header'] =  Yii::t('desk', 'Expert Groups');
?>

<div class="box box-info">
    <div class="box-header with-border">
        <h3 class="box-title"></h3>
    </div>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
