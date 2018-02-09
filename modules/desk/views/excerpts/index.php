<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\desk\models\search\ExcerptsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Excerpts');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="excerpts-index">
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Excerpts'), ['create'], ['class' => 'btn btn-success']) ?>
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
                'contentOptions' => ['class' => 'col-lg-1'],
                'attribute' => 'date',
                'label' => Yii::t('app', 'Date'),
                'format' => 'text',
                'value' => function($model) {
                    return Yii::$app->time->date2front($model->date);
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
                'contentOptions' => ['class' => 'col-lg-8'],
                'attribute' => 'text',
                'label' => Yii::t('app', 'Text'),
                'format' => 'html',
                'value' => function($model) {
                    return $model->text;
                },
            ]
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
