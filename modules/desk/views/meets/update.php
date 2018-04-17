<?php

use app\modules\desk\widgets\expertSchedule\ExpertScheduleCalendar;
use app\modules\desk\widgets\patientSchedule\PatientScheduleCalendar;

/* @var $this yii\web\View */
/* @var $model app\modules\desk\models\Meets */

$this->title = Yii::t('desk', 'Update {modelClass}: ', [
        'modelClass' => 'Meets',
    ]) . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('desk', 'Meets'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('desk', 'Update');
$this->blocks['content-header'] = Yii::t('desk', 'Meets');
?>

<div class="box box-primary">

    <?= $this->render('_form', [
        'model' => $model,
        'availablePlaces' => $availablePlaces,
        'availableExpertGroups' => $availableExpertGroups
    ]) ?>

</div>


<div class="row">
    <div class="col-lg-6">
        <?= PatientScheduleCalendar::widget(['model' => $model, 'patientId' => $model->patient_id]) ?>
    </div>
    <div class="col-lg-6">
        <?= ExpertScheduleCalendar::widget(['model' => $model, 'expertId' => $model->expert_id]) ?>
    </div>
</div>
