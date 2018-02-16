<?php

/* @var $this yii\web\View */
/* @var $model app\modules\desk\models\Courses */

$this->title = Yii::t('desk', 'Update {modelClass}: ', [
    'modelClass' => 'Courses',
]) . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('desk', 'Courses'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->blocks['content-header'] =  Yii::t('desk', 'Courses');
?>

<div class="box box-info">
    <div class="box-header with-border">
        <h3 class="box-title"></h3>
    </div>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
