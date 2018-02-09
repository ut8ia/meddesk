<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\desk\models\search\MeetsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Meets');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="meets-index">


    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Meets'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

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
                                'title' => Yii::t('app', 'Edit'),
                                'data-pjax' => 1,
                                'class' => 'grid-edit-action'
                            ]);
                        }
                    }
                ]
            ],
            [
                'contentOptions' => ['class' => 'col-lg-2'],
                'attribute' => 'expert_id',
                'label' => Yii::t('app', 'Expert'),
                'format' => 'object',
                'value' => function($model) {
                    return $model->experts;
                },
            ],
            ['contentOptions' => ['class' => 'col-lg-1'],
                'attribute' => 'expertGroup',
                'label' => Yii::t('app', 'Expert group'),
                'format' => 'object',
                'value' => function($model) {
                    return ['object' => $model->expertGroups, 'view' => 'label'];
                },
            ],
            [
                'contentOptions' => ['class' => 'col-lg-3'],
                'attribute' => 'patient_id',
                'label' => Yii::t('app', 'Patient'),
                'format' => 'object',
                'value' => function($model) {
                    return $model->patients;
                },
            ],
            [
                'contentOptions' => ['class' => 'col-lg-2'],
                'attribute' => 'place_id',
                'label' => Yii::t('app', 'Place'),
                'format' => 'object',
                'value' => function($model) {
                    return $model->places;
                },
            ],
            [
                'contentOptions' => ['class' => 'col-lg-2'],
                'attribute' => 'status',
                'label' => Yii::t('app', 'From'),
                'format' => 'html',
                'value' => function($model) {
                    return Yii::$app->time->datetime2front($model->time_from);
                },
            ],
            [
                'contentOptions' => ['class' => 'col-lg-1'],
                'attribute' => 'status',
                'label' => Yii::t('app', 'Status'),
                'format' => 'html',
                'value' => function($model) {
                    return $model->status;
                },
            ]
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>