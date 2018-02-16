<?php

/* @var $this yii\web\View */
/* @var $model app\modules\desk\models\CoursesList */

$this->title = Yii::t('desk', 'Update {modelClass}: ', [
    'modelClass' => 'Courses List',
]) . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('desk', 'Courses Lists'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('desk', 'Update');
$this->blocks['content-header'] =  Yii::t('desk', 'Courses Lists');
?>

<div class="box box-info">
    <div class="box-header with-border">
        <h3 class="box-title"></h3>
    </div>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
