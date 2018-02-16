<?php

/* @var $this yii\web\View */
/* @var $model app\modules\desk\models\ScheduleTemplates */

$this->title = Yii::t('desk', 'Update {modelClass}: ', [
    'modelClass' => 'Schedule Templates',
]) . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('desk', 'Schedule Templates'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('desk', 'Update');
$this->blocks['content-header'] =  Yii::t('desk', 'Schedule Templates');
?>

<div class="box box-info">
    <div class="box-header with-border">
        <h3 class="box-title"></h3>
    </div>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
