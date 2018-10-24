<?php

/* @var $this yii\web\View */
/* @var $model app\modules\desk\models\Meets */

$this->title = Yii::t('desk', 'Update {modelClass}: ', [
        'modelClass' => 'Meets',
    ]) . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('desk', 'Meets'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('desk', 'Update');
$this->blocks['content-header'] = Yii::t('desk', 'Meets');
?>


    <?= $this->render('_form', [
        'model' => $model,
        'availablePlaces' => $availablePlaces,
        'availableExpertGroups' => $availableExpertGroups
    ]) ?>

