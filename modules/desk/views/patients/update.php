<?php

/* @var $this yii\web\View */
/* @var $model app\modules\desk\models\Patients */

$this->title = Yii::t('desk', 'Update {modelClass}: ', [
    'modelClass' => 'Patients',
]) . $model->surname;
$this->params['breadcrumbs'][] = ['label' => Yii::t('desk', 'Patients'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->surname, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('desk', 'Update');
$this->blocks['content-header'] =  Yii::t('desk', 'Patients').":". $model->surname;
?>



    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
