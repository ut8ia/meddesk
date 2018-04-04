<?php

use app\modules\desk\widgets\expertSchedule\ExpertScheduleCalendar;
use app\modules\desk\widgets\patientSchedule\PatientScheduleCalendar;

/* @var $this yii\web\View */
/* @var $model app\modules\desk\models\Meets */

$this->title = Yii::t('desk', 'Create Meet');
$this->params['breadcrumbs'][] = ['label' => Yii::t('desk', 'Meets'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$this->blocks['content-header'] = Yii::t('desk', 'Create Meet');
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

        <?= PatientScheduleCalendar::widget(['model' => $model]) ?>

        <?= ExpertScheduleCalendar::widget(['model' => $model]) ?>

    </div>
</div>