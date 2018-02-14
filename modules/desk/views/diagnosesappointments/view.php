<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\desk\models\DiagnosesAppointments */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('desk', 'Diagnoses Appointments'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="diagnoses-appointments-view">



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
            'patient_id',
            'expert_id',
            'expert_group_id',
            'diagnoses_id',
            'appointment_type',
            'date',
            'text',
        ],
    ]) ?>

</div>
