<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\desk\models\search\DiagnosesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('desk', 'Diagnoses');
$this->params['breadcrumbs'][] = $this->title;
$this->blocks['content-header'] =   Yii::t('desk', 'Diagnoses');
?>

<div class="box box-info">
    <div class="box-header with-border">
        <?= Html::a(Yii::t('desk', 'Create Diagnose'), ['create'], ['class' => 'btn btn-success']) ?>
    </div>
    <?php Pjax::begin(); ?>
    <?php //echo $this->render('_search', ['model' => $searchModel]); ?>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
//        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\ActionColumn',
                'template' => '{update} {delete} {view}',
                'contentOptions' => [
                    'nowrap' => 'nowrap'
                ]],
            [
                'contentOptions' => ['class' => 'col-lg-2'],
                'attribute' => 'code',
                'label' => Yii::t('desk', 'Diagnose code'),
                'format' => 'html',
                'value' => function($model) {
                    return $model->code;
                },
            ],
            [
                'contentOptions' => ['class' => 'col-lg-10'],
                'attribute' => 'name',
                'label' => Yii::t('desk', 'Diagnose name'),
                'format' => 'html',
                'value' => function($model) {
                    return $model->name;
                },
            ],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
