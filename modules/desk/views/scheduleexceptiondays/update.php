<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\desk\models\ScheduleExceptionDays */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Schedule Exception Days',
]) . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Schedule Exception Days'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="schedule-exception-days-update">



    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
