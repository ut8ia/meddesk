<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\desk\models\Courses */

$this->title = $model->number;
$this->params['breadcrumbs'][] = ['label' => Yii::t('desk', 'Courses'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="courses-view">



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
            'number',
            [
                'label' => Yii::t('desk', 'Date start'),
                'format' => 'html',
                'value' => Yii::$app->time->date2front($model->date_start)
            ],
            [
                'label' => Yii::t('desk', 'Date end'),
                'format' => 'html',
                'value' => Yii::$app->time->date2front($model->date_end)
            ],
            'status',
        ],
    ]) ?>

</div>
