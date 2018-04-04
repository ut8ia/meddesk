<?php

namespace app\modules\desk\widgets\patientSchedule;

use app\modules\desk\services\datasource\meets\PatientMeets;
use yii\base\Widget;
use yii2fullcalendar\models\Event;

use app\modules\desk\models\Patients;
use app\modules\desk\models\Meets;
use Yii;


/**
 * Class  PatientScheduleCalendar
 * @package app\modules\desk\widgets\patientSchedule
 * @property Patients $patient
 * @property Meets $meet
 */
class PatientScheduleCalendar extends Widget
{

    public $model;
    public $form;
    public $type = 'calendar';
    public $patient;
    public $meet;

    public function run()
    {

        return $this->render($this->type,
            [
                'model' => $this->model,
                'form' => $this->form,
                'events' => $this->findEvents(),
            ]);
    }

    /**
     * @return array
     */
    private function findEvents()
    {

        $meets = isset($this->patient->meets)?$this->patient->meets:[];
        $events = [];
        $meetProcessor = new PatientMeets();

        foreach ($meets as $meet) {
            $events[] = $meetProcessor->meet2event($meet);
        }

        return $events;
    }

}
