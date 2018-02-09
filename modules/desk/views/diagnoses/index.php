<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\desk\models\search\DiagnosesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Diagnoses');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="diagnoses-index">
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Diagnoses'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

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
                'attribute' => 'code',
                'label' => Yii::t('app', 'Diagnose code'),
                'format' => 'html',
                'value' => function($model) {
                    return $model->code;
                },
            ],
            [
                'contentOptions' => ['class' => 'col-lg-10'],
                'attribute' => 'name',
                'label' => Yii::t('app', 'Diagnose name'),
                'format' => 'html',
                'value' => function($model) {
                    return $model->name;
                },
            ],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
