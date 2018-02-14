<?php

use yii\data\ArrayDataProvider;
use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\ListView;
use Yii;

/* @var $this yii\web\View */
/* @var $model app\modules\desk\models\ExpertGroups */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('desk', 'Expert Groups'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="expert-groups-view">



    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'description',
            'course_required:boolean',
            'excerpt_required:boolean',
            'excerpt_order',
            [
                'label' => Yii::t('desk', 'Experts'),
                'format' => 'object',
                'value' => ['object' => $model->experts, 'view' => 'Experts/label' ]
            ],
            [
                'label' => Yii::t('desk', 'Display color'),
                'format' => 'object',
                'value' => ['object' => $model, 'view' => 'label']
            ]
        ],
    ]) ?>

</div>
