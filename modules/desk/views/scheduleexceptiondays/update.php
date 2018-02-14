<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\desk\models\ScheduleExceptionDays */

$this->title = Yii::t('desk', 'Update {modelClass}: ', [
    'modelClass' => 'Schedule Exception Days',
]) . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('desk', 'Schedule Exception Days'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('desk', 'Update');
?>
<div class="schedule-exception-days-update">



    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
