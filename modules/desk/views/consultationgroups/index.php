<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\desk\models\search\ConsultationExpertGroupsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('desk', 'Consultation Groups');
$this->params['breadcrumbs'][] = $this->title;
$this->blocks['content-header'] =  Yii::t('desk', 'Consultation Groups');
?>

<div class="box box-info">
    <div class="box-header with-border">
        <?= Html::a(Yii::t('desk', 'Create Consultation Group'), ['create'], ['class' => 'btn btn-success']) ?>
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
                ]],
            [
                'contentOptions' => ['class' => 'col-lg-2'],
                'attribute' => 'name',
                'label' => Yii::t('desk', 'Group name'),
                'format' => 'html',
                'value' => function($model) {
                    return $model->name;
                },
            ],
            [
                'contentOptions' => ['class' => 'col-lg-8'],
                'attribute' => 'name',
                'label' => Yii::t('desk', 'Description'),
                'format' => 'html',
                'value' => function($model) {
                    return $model->description;
                },
            ],
            [
                'contentOptions' => ['class' => 'col-lg-2'],
                'attribute' => 'name',
                'label' => Yii::t('desk', 'Experts'),
                'format' => 'html',
                'value' => function($model) {
                    return count($model->experts);
                },
            ]
            // 'excerpt_order',

        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
