<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\desk\models\Patients */

$this->title = Yii::t('desk', 'Create Patients');
$this->params['breadcrumbs'][] = ['label' => Yii::t('desk', 'Patients'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="patients-create">



    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
