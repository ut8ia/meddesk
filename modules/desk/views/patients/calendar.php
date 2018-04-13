<?php
use app\modules\desk\widgets\patientSchedule\PatientScheduleCalendar;




?>








<?= PatientScheduleCalendar::widget([
    'patient' => $model
]) ?>