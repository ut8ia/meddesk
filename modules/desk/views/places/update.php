<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\desk\models\Places */

$this->title = Yii::t('desk', 'Update {modelClass}: ', [
    'modelClass' => 'Places',
]) . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('desk', 'Places'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('desk', 'Update');
?>
<div class="places-update">



    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
