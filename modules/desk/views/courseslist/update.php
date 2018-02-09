<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\desk\models\CoursesList */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Courses List',
]) . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Courses Lists'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="courses-list-update">



    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
