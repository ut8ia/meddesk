<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\desk\models\search\BuildingsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('desk', 'Buildings');
$this->params['breadcrumbs'][] = $this->title;
$this->blocks['content-header'] =  Yii::t('desk', 'Buildings');
?>

<div class="box box-info">
    <div class="box-header with-border">
        <?= Html::a(Yii::t('desk', 'Create Courses'), ['create'], ['class' => 'btn btn-success']) ?>
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
                ],
            ],
            [
                'contentOptions' => ['class' => 'col-lg-2 '],
                'label' => ucfirst(Yii::t('desk', 'name')),
                'attribute' => 'name',
                'format' => 'html',
                'value' => function($model) {
                    return $model->name;
                },
            ],
            [
                'contentOptions' => ['class' => 'col-lg-8 '],
                'label' => ucfirst(Yii::t('desk', 'adress')),
                'attribute' => 'adress',
                'format' => 'html',
                'value' => function($model) {
                    return $model->adress;
                },
            ],
            [
                'contentOptions' => ['class' => 'col-lg-1 '],
                'label' => ucfirst(Yii::t('desk', 'places')),
                'attribute' => 'places',
                'format' => 'html',
                'value' => function($model) {
                    return count($model->places);
                },
            ],

//            'lattitude',
//            'longitude',
            // 'floors',

//            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
