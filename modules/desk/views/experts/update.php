<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\desk\models\Experts */

$this->title = Yii::t('desk', 'Update {modelClass}: ', [
        'modelClass' => 'Experts',
    ]) . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('desk', 'Experts'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('desk', 'Update');
?>
<div class="experts-update">



    <?= $this->render('_form', [
        'model' => $model,
        'availablePlaces' => $availablePlaces,
        'availableExpertGroups' => $availableExpertGroups
    ]) ?>

</div>
