<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\desk\models\Patients */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Patients',
]) . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Patients'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="patients-update">



    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
