<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\desk\models\Buildings */

$this->title = Yii::t('desk', 'Update {modelClass}: ', [
    'modelClass' => 'Buildings',
]) . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('desk', 'Buildings'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('desk', 'Update');
?>
<div class="buildings-update">



    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
