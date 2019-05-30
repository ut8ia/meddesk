<?php

use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\desk\models\search\DiagnosesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('desk', 'Diagnoses');
$this->params['breadcrumbs'][] = $this->title;
$this->blocks['content-header'] =   Yii::t('desk', 'Regions');
?>

<div class="box box-info">
    <div class="box-header with-border">
    </div>
    <?php Pjax::begin(); ?>
    <?php //echo $this->render('_search', ['model' => $searchModel]); ?>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
//        'filterModel' => $searchModel,
        'columns' => [
            [
                'contentOptions' => ['class' => 'col-lg-2'],
                'attribute' => 'code',
                'label' => Yii::t('desk', 'Region'),
                'format' => 'html',
                'value' => function($model) {
                    return $model->name;
                },
            ],
            [
                'contentOptions' => ['class' => 'col-lg-8'],
                'attribute' => 'name',
                'label' => Yii::t('desk', 'Patients'),
                'format' => 'html',
                'value' => function($model) {
                    return count($model->patients);
                },
            ],
//            [
//                'contentOptions' => ['class' => 'col-lg-2'],
////                'attribute' => 'name',
//                'label' => Yii::t('desk', 'Appointed'),
//                'format' => 'html',
//                'value' => function($model) {
//                    return count($model->diagnosesAppointments);
//                },
//            ],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
