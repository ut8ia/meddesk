<?php

use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\desk\models\search\DiagnosesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('desk', 'Diagnoses');
$this->params['breadcrumbs'][] = $this->title;
$this->blocks['content-header'] = Yii::t('desk', 'Diagnoses');
?>

<div class="box box-info">
    <div class="box-header with-border">
    </div>
    <?php Pjax::begin(); ?>
    <?php //echo $this->render('_search', ['model' => $searchModel]); ?>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
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
                'contentOptions' => ['class' => 'col-lg-3'],
                'attribute' => 'name',
                'label' => Yii::t('desk', 'Diagnose name'),
                'format' => 'html',
                'value' => function($model) {
                    return $model->name;
                },
            ],
            [
                'contentOptions' => ['class' => 'col-lg-1'],
                'label' => Yii::t('desk', 'Total'),
                'format' => 'html',
                'value' => function($model) {
                    return $model->getTotal();
                },
            ],
            [
                'contentOptions' => ['class' => 'col-lg-1'],
                'label' => Yii::t('desk', '0-1'),
                'format' => 'html',
                'value' => function($model) {
                    return $model->getAge(0, 1);
                },
            ],
            [
                'contentOptions' => ['class' => 'col-lg-1'],
                'label' => Yii::t('desk', '2-3'),
                'format' => 'html',
                'value' => function($model) {
                    return $model->getAge(2, 3);
                },
            ],
            [
                'contentOptions' => ['class' => 'col-lg-1'],
                'label' => Yii::t('desk', '4-5'),
                'format' => 'html',
                'value' => function($model) {
                    return $model->getAge(4, 5);
                },
            ],
            [
                'contentOptions' => ['class' => 'col-lg-1'],
                'label' => Yii::t('desk', '6-7'),
                'format' => 'html',
                'value' => function($model) {
                    return $model->getAge(6, 7);
                },
            ],
            [
                'contentOptions' => ['class' => 'col-lg-1'],
                'label' => Yii::t('desk', '8-10'),
                'format' => 'html',
                'value' => function($model) {
                    return $model->getAge(8, 10);
                },
            ],
            [
                'contentOptions' => ['class' => 'col-lg-1'],
                'label' => Yii::t('desk', '11-12'),
                'format' => 'html',
                'value' => function($model) {
                    return $model->getAge(11, 12);
                },
            ],
            [
                'contentOptions' => ['class' => 'col-lg-1'],
                'label' => Yii::t('desk', '>12'),
                'format' => 'html',
                'value' => function($model) {
                    return $model->getAge(12, null);
                },
            ],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
