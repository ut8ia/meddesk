<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\desk\models\search\PatientsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('desk', 'Patients');
$this->params['breadcrumbs'][] = $this->title;
$this->blocks['content-header'] = Yii::t('desk', 'Patients');
?>

<div class="box box-info">
    <div class="box-header with-border">
        <?= Html::a(Yii::t('desk', 'Create Patient'), ['create'], ['class' => 'btn btn-success']) ?>
    </div>
    <?php Pjax::begin(); ?>
    <?php //echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\ActionColumn',
                'template' => '{update} {view} {calendar} {print}',
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
                    },
                    'calendar' => function($url, $model) {
                        return Html::a('<span class="glyphicon glyphicon-calendar"></span>', $url, [
                            'title' => Yii::t('desk', 'Calendar'),
                            'data-pjax' => 1,
                            'class' => 'grid-calendar-action'
                        ]);
                    },
                ]
            ],
            [
                'contentOptions' => ['class' => 'col-lg-3'],
                'attribute' => 'surname',
                'label' => Yii::t('desk', 'Patient'),
                'format' => 'html',
                'value' => function($model) {
                    return Yii::$app->formatter->asObject([
                        'object' => $model,
                        'view' => 'snp_styled'
                    ]);
                },
            ],
            [
                'contentOptions' => ['class' => 'col-lg-3'],
                'attribute' => 'card_number',
                'label' => Yii::t('desk', 'Card number'),
                'format' => 'html',
                'value' => function($model) {
                    return $model->card_number;
                },
            ],
            [
                'contentOptions' => ['class' => 'col-lg-2'],
                'attribute' => 'birthdate',
                'label' => Yii::t('desk', 'Birth date'),
                'format' => 'html',
                'value' => function($model) {
                    return Yii::$app->time->date2front($model->birthdate);
                },
            ],
            [
                'contentOptions' => ['class' => 'col-lg-2'],
                'attribute' => 'courses',
                'label' => Yii::t('desk', 'Courses'),
                'format' => 'html',
                'value' => function($model) {
                    return count($model->courses);
                },
            ],
            [
                'contentOptions' => ['class' => 'col-lg-2'],
                'attribute' => 'meets',
                'label' => Yii::t('desk', 'Meets'),
                'format' => 'html',
                'value' => function($model) {
                    return count($model->meets);
                },
            ],
            // 'sex',
            // 'birthdate',
            // 'region_id',
            // 'city',
            // 'city_id',
            // 'district',
            // 'district_a',
            // 'user_id',
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
