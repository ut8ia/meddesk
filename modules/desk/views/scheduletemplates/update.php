<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\desk\models\ScheduleTemplates */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Schedule Templates',
]) . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Schedule Templates'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="schedule-templates-update">



    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
