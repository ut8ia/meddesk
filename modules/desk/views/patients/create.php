<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\desk\models\Patients */

$this->title = Yii::t('app', 'Create Patients');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Patients'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="patients-create">



    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
