<?php

/* @var $this yii\web\View */
/* @var $model app\modules\desk\models\Schedule */

$this->title = Yii::t('desk', 'Update {modelClass}: ', [
    'modelClass' => 'Schedule',
]) . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('desk', 'Schedules'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('desk', 'Update');
$this->blocks['content-header'] =  Yii::t('desk', 'Schedules');
?>

<div class="box box-info">
    <div class="box-header with-border">
        <h3 class="box-title"></h3>
    </div>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
