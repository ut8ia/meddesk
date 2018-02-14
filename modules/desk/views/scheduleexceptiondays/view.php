<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\desk\models\ScheduleExceptionDays */

$this->title =  Yii::$app->time->date2front($model->date);
$this->params['breadcrumbs'][] = ['label' => Yii::t('desk', 'Schedule Exception Days'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="schedule-exception-days-view">



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
            [
                'label' => Yii::t('desk', 'Date'),
                'format' => 'html',
                'value' => Yii::$app->time->date2front($model->date)
            ],
            'comment',
        ],
    ]) ?>

</div>
