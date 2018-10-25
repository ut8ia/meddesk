<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\desk\models\Meets */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('desk', 'Meets'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="meets-view">


    <p>
        <?= Html::a(Yii::t('desk', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('desk', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('desk', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            [
                'label' => Yii::t('desk', 'Expert'),
                'format' => 'object',
                'value' => function($model) {
                    return ['object' => $model->experts, 'view' => 'snp_styled'];
                },
            ],
            [
                'label' => Yii::t('desk', 'Patient'),
                'format' => 'object',
                'value' => function($model) {
                    return ['object' => $model->patients, 'view' => 'snp_styled'];
                },
            ],
            [
                'label' => Yii::t('desk', 'Place'),
                'format' => 'object',
                'value' => function($model) {
                    return $model->places;
                },
            ], [
                'label' => Yii::t('desk', 'Date'),
                'format' => 'html',
                'value' => function($model) {
                    return $model->time_from;
                },
            ],
            'comment',
        ],
    ]) ?>

</div>
