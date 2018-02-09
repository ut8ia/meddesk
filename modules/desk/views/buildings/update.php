<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\desk\models\Buildings */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Buildings',
]) . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Buildings'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="buildings-update">



    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
