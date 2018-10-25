<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\desk\models\Patients */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('desk', 'Patients'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="patients-view">


    <p>
        <?= Html::a(Yii::t('desk', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
    </p>

    <div id="printf" name="printf">
    <h1 class="text-center"> <?=  $model->card_number."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  <b>  ".ucfirst($model->surname) . " </b>" . ucfirst($model->name) . " " . ucfirst($model->patronymic) . " " ?></h1>
    </div>
</div>
