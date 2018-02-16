<?php

/* @var $this yii\web\View */
/* @var $model app\modules\desk\models\Courses */

$this->title = Yii::t('desk', 'Create Courses');
$this->params['breadcrumbs'][] = ['label' => Yii::t('desk', 'Courses'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$this->blocks['content-header'] = Yii::t('desk', 'Create Courses');
?>
<div class="box box-success">
    <div class="box-header with-border">
        <h3 class="box-title"></h3>
    </div>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
