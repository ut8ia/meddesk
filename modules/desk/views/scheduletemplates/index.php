<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\modules\desk\models\search\ScheduleTemplatesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('desk', 'Schedule Templates');
$this->params['breadcrumbs'][] = $this->title;
$this->blocks['content-header'] = Yii::t('desk', 'Schedule Templates');
?>

<div class="box box-info">
    <div class="box-header with-border">
        <?= Html::a(Yii::t('desk', 'Create schedule template'), ['create'], ['class' => 'btn btn-success']) ?>
    </div>
    <?php Pjax::begin(); ?>
    <?php //echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'expert_id',
            'expert_group_id',
            'place_id',
            'week_day',
            // 'time_from',
            // 'time_to',
            // 'comment',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
