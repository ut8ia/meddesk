<?php

/* @var $this yii\web\View */
/* @var $model app\modules\desk\models\Meets */

$this->title = Yii::t('desk', 'Update {modelClass}: ', [
        'modelClass' => 'statistic ticket',
    ]) . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('desk', 'statistic tickets'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('desk', 'Update');
$this->blocks['content-header'] = Yii::t('desk', 'statistic ticket');
?>


    <?= $this->render('_form', [
        'model' => $model,
        'availablePlaces' => $availablePlaces,
        'availableExpertGroups' => $availableExpertGroups
    ]) ?>

