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
<div class="box box-success">


    <?= $this->render('_form', [
        'model' => $model,
        'availablePlaces' => $availablePlaces,
        'availableExpertGroups' => $availableExpertGroups
    ]) ?>

</div>


<div class="row">
    <div class="col-lg-6">

        <?= PatientScheduleCalendar::widget(['model' => $model]) ?>
    </div>
    <div class="col-lg-6">

        <?= ExpertScheduleCalendar::widget(['model' => $model]) ?>

    </div>
</div>