<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\desk\models\search\CoursesListSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Courses Lists');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="courses-list-index">
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Courses List'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
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
                'attribute' => 'course_id',
                'label' => Yii::t('app', 'Course'),
                'format' => 'object',
                'value' => function($model) {
                    return $model->courses;
                },
            ],
            [
                'contentOptions' => ['class' => 'col-lg-3'],
                'attribute' => 'patient',
                'label' => Yii::t('app', 'Patient'),
                'format' => 'object',
                'value' => function($model) {
                    return $model->patients;
                },
            ],
            [
                'contentOptions' => ['class' => 'col-lg-2'],
                'attribute' => 'date_from',
                'label' => Yii::t('app', 'Date from'),
                'format' => 'html',
                'value' => function($model) {
                    return Yii::$app->time->date2front($model->date_from);
                },
            ],
            [
                'contentOptions' => ['class' => 'col-lg-2'],
                'attribute' => 'date_to',
                'label' => Yii::t('app', 'Date to'),
                'format' => 'html',
                'value' => function($model) {
                    return Yii::$app->time->date2front($model->date_to);
                },
            ],
            [
                'contentOptions' => ['class' => 'col-lg-2'],
                'attribute' => 'status',
                'label' => Yii::t('app', 'Status'),
                'format' => 'object',
                'value' => function($model) {
                    return ['object' => $model, 'view' => 'status_label'];
                },
            ],
            [
                'contentOptions' => ['class' => 'col-lg-2'],
                'attribute' => 'comment',
                'label' => Yii::t('app', 'Comment'),
                'format' => 'html',
                'value' => function($model) {
                    return $model->comment;
                },
            ],

        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
