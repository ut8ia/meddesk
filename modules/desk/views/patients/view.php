<?php

use yii\helpers\Html;
use app\modules\desk\assets\JqueryPrintAsset;
use yii\helpers\Url;

JqueryPrintAsset::register($this);

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
    <div class="row">
        <div class="col-lg-12">
            <h1 class="text-center"><?= $model->card_number ?></h1>
        </div>
        <div class="col-lg-12">
            <h1 class="text-center">
                <b><?= ucfirst($model->surname) . " </b>" . ucfirst($model->name) . " " . ucfirst($model->patronymic) . " " ?>
            </h1>
        </div>

        <div class="col-lg-12 text-center">
            <?= Yii::t('desk', 'Birthdate') . ' : ' . Yii::$app->time->date2front($model->birthdate) ?>
        </div>

        <div class="col-lg-12 text-center">
            <?= Yii::t('desk', 'Sex') . ' : ' . Yii::t('desk', $model->sex) ?>
        </div>

        <div class="col-lg-12 text-center">
            <?= Yii::t('desk', 'Region') . ' : ' . $model->region->name ?>
        </div>

        <div class="col-lg-12 text-center">

            <?php
            $place = '';
            if (isset($model->cityOrigin->name)) {
                $place = $model->cityOrigin->type . '. ' . $model->cityOrigin->name;
            }
            ?>

            <?= Yii::t('desk', 'Address') . ' : ' . $place . ' ' . $model->address ?>
        </div>

        <div class="col-lg-12 text-center">
            <?= Yii::t('desk', 'Phone') . ' : ' . $model->phone ?>
        </div>
        <div class="col-lg-12 text-center">
            <?= Yii::t('desk', 'Email') . ' : ' . $model->email ?>
        </div>

    </div>
    <div class="row">
        <div class="col-lg-2">

        </div>
        <div class="col-lg-2 btn btn-success" onclick="$('.rehabilitationFolderlabel').print()">
            <?= Yii::t('desk', 'Rehabilitation Folder label') ?>
        </div>
        <div class="col-lg-2 btn btn-success" onclick="$('.outpatientFolderlabel').print()">
            <?= Yii::t('desk', 'Outpatient Folder label') ?>
        </div>
        <div class="col-lg-2">
            <?= Html::a('Stat tickets' , Url::to('/desk/stat-tickets/index?StatTicketsSearch[patient_id]='.$model->id) ) ?>
        </div>
    </div>

    <div class="hidden1">
        <div class="rehabilitationFolderlabel">
            <?= $this->render('rehabilitation_folder_lable', [
                'model' => $model,
            ]) ?>
        </div>
        <div class="outpatientFolderlabel">
            <?= $this->render('outpatient_folder_lable', [
                'model' => $model,
            ]) ?>
        </div>

    </div>


</div>

</div>
