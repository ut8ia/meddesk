<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\desk\models\Courses */

$this->title = Yii::t('desk', 'Update {modelClass}: ', [
    'modelClass' => 'Courses',
]) . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('desk', 'Courses'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('desk', 'Update');
?>
<div class="courses-update">



    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
