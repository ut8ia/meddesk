<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\desk\models\search\PlacesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('desk', 'Places');
$this->params['breadcrumbs'][] = $this->title;
$this->blocks['content-header'] = Yii::t('desk', 'Places');
?>

<div class="box box-info">
    <div class="box-header with-border">
        <?= Html::a(Yii::t('desk', 'Create Place'), ['create'], ['class' => 'btn btn-success']) ?>
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
                'contentOptions' => ['class' => 'col-lg-1 '],
                'label' => ucfirst(Yii::t('desk', 'number')),
                'attribute' => 'number',
                'format' => 'html',
                'value' => function($model) {
                    return $model->number;
                },
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
                'contentOptions' => ['class' => 'col-lg-2 '],
                'label' => ucfirst(Yii::t('desk', 'building')),
                'attribute' => 'building_id',
                'format' => 'object',
                'value' => function($model) {
                    return $model->buildings;
                },
            ],
            [
                'contentOptions' => ['class' => 'col-lg-1 '],
                'label' => ucfirst(Yii::t('desk', 'floor')),
                'attribute' => 'floor',
                'format' => 'html',
                'value' => function($model) {
                    return $model->floor;
                },
            ],
            [
                'contentOptions' => ['class' => 'col-lg-7 '],
                'label' => ucfirst(Yii::t('desk', 'experts')),
                'attribute' => 'experts',
                'format' => 'object',
                'value' => function($model) {
                    return $model->experts;
                },
            ],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
