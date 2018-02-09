<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\desk\models\search\ScheduleExceptionDaysSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Schedule Exception Days');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="schedule-exception-days-index">


    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Schedule Exception Days'), ['create'], ['class' => 'btn btn-success']) ?>
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
                'contentOptions' => ['class' => 'col-lg-2'],
                'attribute' => 'date',
                'label' => Yii::t('app', 'Date'),
                'format' => 'html',
                'value' => function($model) {
                    return Yii::$app->time->date2front($model->date);
                },
            ],
            [
                'contentOptions' => ['class' => 'col-lg-10'],
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
