<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\desk\models\Diagnoses */

$this->title = Yii::t('desk', 'Update {modelClass}: ', [
    'modelClass' => 'Diagnoses',
]) . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('desk', 'Diagnoses'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('desk', 'Update');
?>
<div class="diagnoses-update">



    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
