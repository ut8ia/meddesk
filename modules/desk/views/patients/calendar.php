<?php

use app\modules\desk\widgets\patientSchedule\PatientScheduleCalendar;
use Yii;

$patientData = Yii::$app->formatter->asObject(
    [
        'object' => $model,
        'view' => 'full_and_birth'
    ]);


$this->title = Yii::t('desk', 'Calendar {modelClass}: ', [
        'modelClass' => 'Patients',
    ]) . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('desk', 'Patients'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->surname, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('desk', 'Calendar');
$this->blocks['content-header'] = Yii::t('desk', 'Calendar').' : '.$patientData;

?>


<?= PatientScheduleCalendar::widget([
    'patient' => $model
]) ?>