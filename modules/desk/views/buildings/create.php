<?php

/* @var $this yii\web\View */
/* @var $model app\modules\desk\models\Buildings */

$this->title = Yii::t('desk', 'Create Buildings');
$this->params['breadcrumbs'][] = ['label' => Yii::t('desk', 'Buildings'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$this->blocks['content-header'] = Yii::t('desk', 'Buildings');
?>
<div class="box box-success">
    <div class="box-header with-border">
        <h3 class="box-title"></h3>
    </div>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
