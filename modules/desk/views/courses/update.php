<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\desk\models\Courses */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Courses',
]) . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Courses'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="courses-update">



    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
