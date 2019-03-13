<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\desk\models\search\MeetsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('desk', 'Statistic Tickets');
$this->params['breadcrumbs'][] = $this->title;
$this->blocks['content-header'] = Yii::t('desk', 'Statistic Tickets');
?>

<?php echo $this->render('_search', ['model' => $searchModel]); ?>

<div class="box box-info">
    <div class="box-header with-border">
        <?= Html::a(Yii::t('desk', 'Create Statistic Ticket'), ['create'], ['class' => 'btn btn-success']) ?>
    </div>
    <div class="box-body">
        <?php Pjax::begin(); ?>

        <?= GridView::widget([
            'dataProvider' => $dataProvider,
//            'filterModel' => $searchModel,
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
                                    'title' => Yii::t('desk', 'Edit'),
                                    'data-pjax' => 1,
                                    'class' => 'grid-edit-action'
                                ]);
                            }
                        }
                    ]
                ],
                [
                    'contentOptions' => ['class' => 'col-lg-3'],
                    'attribute' => 'expert_id',
                    'label' => Yii::t('desk', 'Expert'),
                    'format' => 'object',
                    'value' => function($model) {
                        return ['object' => $model->experts, 'view' => 'snp_styled'];
                    },
                ],

                [
                    'contentOptions' => ['class' => 'col-lg-3'],
                    'attribute' => 'patient_id',
                    'label' => Yii::t('desk', 'Patient'),
                    'format' => 'object',
                    'value' => function($model) {
                        return ['object' => $model->patients, 'view' => 'snp_styled'];
                    },
                ],
                [
                    'contentOptions' => ['class' => 'col-lg-2'],
                    'attribute' => 'place_id',
                    'label' => Yii::t('desk', 'Place'),
                    'format' => 'object',
                    'value' => function($model) {
                        return $model->places;
                    },
                ],
                [
                    'contentOptions' => ['class' => 'col-lg-2'],
                    'attribute' => 'status',
                    'label' => Yii::t('desk', 'Date'),
                    'format' => 'html',
                    'value' => function($model) {
                        return Yii::$app->time->datetime2front($model->time_from);
                    },
                ]
            ],
        ]); ?>
        <?php Pjax::end(); ?>
    </div>
</div>