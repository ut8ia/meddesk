<?php

/* @var $this yii\web\View */
/* @var $model app\modules\desk\models\ExpertGroups */

$this->title = Yii::t('desk', 'Create Expert Groups');
$this->params['breadcrumbs'][] = ['label' => Yii::t('desk', 'Expert Groups'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$this->blocks['content-header'] = Yii::t('desk', 'Expert Groups');
?>
<div class="box box-success">
    <div class="box-header with-border">
        <h3 class="box-title"></h3>
    </div>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
