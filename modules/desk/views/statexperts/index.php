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
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
//            ['class' => 'yii\grid\ActionColumn',
//                'template' => '{view}',
//                'contentOptions' => [
//                    'nowrap' => 'nowrap'
//                ],
//            ],
            [
                'contentOptions' => ['class' => 'col-lg-4 '],
                'label' => Yii::t('desk', 'Expert'),
                'attribute' => 'surname',
                'format' => 'object',
                'value' => function($model) {
                    return ['object' => $model, 'view' => 'snp_styled'];
                },
            ],
//            [
//                'contentOptions' => ['class' => 'col-lg-4 '],
//                'label' => Yii::t('desk', 'Expert groups'),
//                'attribute' => 'expertGroups',
//                'format' => 'object',
//                'value' => function($model) {
//                    return ['object' => $model->expertGroups, 'view' => 'ExpertGroups/label'];
//                },
//            ],
            [
                'contentOptions' => ['class' => 'col-lg-8 '],
                'label' => Yii::t('desk', 'Reports'),
                'format' => 'html',
                'value' => function($model) {
                    return Html::a('Граф прийомів' ,'/desk/statexperts/meetsgraph?id='.$model->id);
                },
            ],
            [
                'contentOptions' => ['class' => 'col-lg-8 '],
                'label' => Yii::t('desk', 'Reports'),
                'format' => 'html',
                'value' => function($model) {
                    return Html::a('Відомість обліку відвідувань' ,'/desk/statexperts/report?id='.$model->id);
                },
            ],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
