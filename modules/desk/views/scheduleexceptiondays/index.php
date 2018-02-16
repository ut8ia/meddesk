<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\desk\models\search\ScheduleExceptionDaysSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('desk', 'Schedule Exception Days');
$this->params['breadcrumbs'][] = $this->title;
$this->blocks['content-header'] = Yii::t('desk', 'Schedule Exception Days');
?>

<div class="box box-info">
    <div class="box-header with-border">
        <?= Html::a(Yii::t('desk', 'Create schedule exception day'), ['create'], ['class' => 'btn btn-success']) ?>
    </div>
    <?php Pjax::begin(); ?>
    <?php //echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\ActionColumn',
                'template' => '{update} {delete} {view}',
                'contentOptions' => [
                    'nowrap' => 'nowrap'
                ]],
            [
                'contentOptions' => ['class' => 'col-lg-2'],
                'attribute' => 'date',
                'label' => Yii::t('desk', 'Date'),
                'format' => 'html',
                'value' => function($model) {
                    return Yii::$app->time->date2front($model->date);
                },
            ],
            [
                'contentOptions' => ['class' => 'col-lg-10'],
                'attribute' => 'comment',
                'label' => Yii::t('desk', 'Comment'),
                'format' => 'html',
                'value' => function($model) {
                    return $model->comment;
                },
            ],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
