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

<div class="row">
    <div class="col-lg-7">

        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title"></h3>
            </div>

            <?= $this->render('_form', [
                'model' => $model,
                'availablePlaces' => $availablePlaces,
                'availableExpertGroups' => $availableExpertGroups
            ]) ?>

        </div>

    </div>
    <div class="col-lg-5">

        <?= PatientScheduleCalendar::widget([
            'patient' => $model->patients,
            'meet' => $model
        ]) ?>

        <?= ExpertScheduleCalendar::widget([
            'expert' => $model->experts,
            'meet' => $model
        ]) ?>

    </div>
</div>
