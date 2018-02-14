<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use Yii;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\desk\models\search\ExpertsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('desk', 'Experts');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="experts-index">


    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('desk', 'Create Experts'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

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
                'label' => Yii::t('desk', 'Expert'),
                'attribute' => 'expertGroups',
                'format' => 'object',
                'value' => function($model) {
                    return ['object' => $model->expertGroups, 'view' => 'ExpertGroups/label'];
                },
            ],
//            'id',
//            'username',
//            'auth_key',
//            'password_hash',
//            'password_reset_token',
            // 'email:email',
            // 'status',
            // 'created_at',
            // 'updated_at',
            // 'surname',
            // 'name',
            // 'patronymic',
            // 'short_info',
            // 'info',
            // 'images',
            // 'specialization',
            // 'slug',
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
