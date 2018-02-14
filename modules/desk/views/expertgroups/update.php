<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\desk\models\ExpertGroups */

$this->title = Yii::t('desk', 'Update {modelClass}: ', [
    'modelClass' => 'Expert Groups',
]) . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('desk', 'Expert Groups'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('desk', 'Update');
?>
<div class="expert-groups-update">



    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
