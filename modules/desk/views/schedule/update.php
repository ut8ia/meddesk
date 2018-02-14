<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\desk\models\Schedule */

$this->title = Yii::t('desk', 'Update {modelClass}: ', [
    'modelClass' => 'Schedule',
]) . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('desk', 'Schedules'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('desk', 'Update');
?>
<div class="schedule-update">



    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
