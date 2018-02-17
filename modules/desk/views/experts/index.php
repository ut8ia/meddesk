<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\desk\models\search\ExpertsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('desk', 'Experts');
$this->params['breadcrumbs'][] = $this->title;
$this->blocks['content-header'] = Yii::t('desk', 'Experts');
?>

<div class="box box-info">
    <div class="box-header with-border">
        <?= Html::a(Yii::t('desk', 'Create Expert'), ['create'], ['class' => 'btn btn-success']) ?>
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
            ],
            [
                'contentOptions' => ['class' => 'col-lg-8 '],
                'label' => Yii::t('desk', 'Expert'),
                'attribute' => 'surname',
                'format' => 'object',
                'value' => function($model) {
                    return ['object' => $model, 'view' => 'fullName'];
                },
            ],
            [
                'contentOptions' => ['class' => 'col-lg-8 '],
                'label' => Yii::t('desk', 'Expert groups'),
                'attribute' => 'expertGroups',
                'format' => 'object',
                'value' => function($model) {
                    return ['object' => $model->expertGroups, 'view' => 'ExpertGroups/label'];
                },
            ],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
