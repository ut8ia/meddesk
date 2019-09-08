<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\desk\models\search\MeetsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('desk', 'Meets');
$this->params['breadcrumbs'][] = $this->title;
$this->blocks['content-header'] = Yii::t('desk', 'Meets');
?>

<div class="box box-info">
    <div class="box-header with-border">
        <?= Html::a(Yii::t('desk', 'Create Meet'), ['create'], ['class' => 'btn btn-success']) ?>
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
                'buttons' => [
                    'update' => function($url, $model) {
                        if ($model->canUpdate()) {
                            return Html::a('<span class="glyphicon glyphicon-pencil"></span>', $url, [
                                'title' => Yii::t('desk', 'Edit'),
                                'data-pjax' => 1,
                                'class' => 'grid-edit-action'
                            ]);
                        }
                    }
                ]
            ],
            [
                'contentOptions' => ['class' => 'col-lg-3'],
                'attribute' => 'patient_id',
                'label' => Yii::t('desk', 'Patient'),
                'format' => 'object',
                'value' => function($model) {
                    return $model->patients;
                },
            ],
            [
                'contentOptions' => ['class' => 'col-lg-2'],
                'attribute' => 'meet_type',
                'label' => Yii::t('desk', 'Meet type'),
                'format' => 'html',
                'value' => function($model) {
                    return $model->meet_type;
                },
            ],
            ['contentOptions' => ['class' => 'col-lg-1'],
                'attribute' => 'expertGroup',
                'label' => Yii::t('desk', 'Expert group'),
                'format' => 'object',
                'value' => function($model) {
                    return ['object' => $model->expertGroups, 'view' => 'label'];
                },
            ],
            [
                'contentOptions' => ['class' => 'col-lg-2'],
                'attribute' => 'place_id',
                'label' => Yii::t('desk', 'Place'),
                'format' => 'object',
                'value' => function($model) {
                    return $model->places;
                },
            ],
            [
                'contentOptions' => ['class' => 'col-lg-2'],
                'attribute' => 'status',
                'label' => Yii::t('desk', 'From'),
                'format' => 'html',
                'value' => function($model) {
                    return $model->time_from?Yii::$app->time->datetime2front($model->time_from):Yii::$app->time->datetime2front($model->plan_from);
                },
            ],
            [
                'contentOptions' => ['class' => 'col-lg-1'],
                'attribute' => 'status',
                'label' => Yii::t('desk', 'Status'),
                'format' => 'html',
                'value' => function($model) {
                    return $model->status;
                },
            ]
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>