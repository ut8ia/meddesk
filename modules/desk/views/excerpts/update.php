<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\desk\models\Excerpts */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Excerpts',
]) . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Excerpts'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="excerpts-update">



    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
