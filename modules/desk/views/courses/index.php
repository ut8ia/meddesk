<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\desk\models\search\CoursesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Courses');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="courses-index">
    <?php Pjax::begin(); ?>
    <?php //echo $this->render('_search', ['model' => $searchModel]); ?>
    <p>
        <?= Html::a(Yii::t('app', 'Create Courses'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\ActionColumn',
                'template' => '{update} {delete} {view}',
                'contentOptions' => [
                    'nowrap' => 'nowrap'
                ]],

            [
                'contentOptions' => ['class' => 'col-lg-1'],
                'attribute' => 'number',
                'label' => Yii::t('app', 'Course'),
                'format' => 'html',
                'value' => function($model) {
                    return $model->number;
                },
            ],
            [
                'contentOptions' => ['class' => 'col-lg-2'],
                'attribute' => 'date_start',
                'label' => Yii::t('app', 'Date start'),
                'format' => 'html',
                'value' => function($model) {
                    return Yii::$app->time->date2front($model->date_start);
                },
            ],
            [
                'contentOptions' => ['class' => 'col-lg-2'],
                'attribute' => 'date_end',
                'label' => Yii::t('app', 'Date end'),
                'format' => 'html',
                'value' => function($model) {
                    return Yii::$app->time->date2front($model->date_end);
                },
            ],
            [
                'contentOptions' => ['class' => 'col-lg-2'],
                'attribute' => 'status',
                'label' => Yii::t('app', 'Status'),
                'format' => 'html',
                'value' => function($model) {
                    return $model->status;
                },
            ],
            [
                'contentOptions' => ['class' => 'col-lg-2'],
                'attribute' => 'patients',
                'label' => Yii::t('app', 'Patients'),
                'format' => 'html',
                'value' => function($model) {
                    return count($model->patients);
                },
            ],
            [
                'contentOptions' => ['class' => 'col-lg-2'],
                'attribute' => 'excerpts',
                'label' => Yii::t('app', 'Excerpts'),
                'format' => 'html',
                'value' => function($model) {
                    return count($model->excerpts);
                },
            ],

        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
