<?php

namespace app\modules\desk\widgets\expertSchedule;

use app\modules\desk\services\datasource\meets\ExpertMeets;
use yii\base\Widget;
use yii2fullcalendar\models\Event;

use app\modules\desk\models\Experts;
use app\modules\desk\models\Meets;
use Yii;


/**
 * Class  ExpertScheduleCalendar
 * @package app\modules\desk\widgets\patientSchedule
 * @property Experts $expert
 * @property Meets $meet
 */
class ExpertScheduleCalendar extends Widget
{

    public $model;
    public $form;
    public $type = 'calendar';
    public $expert;
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

        $meets = isset($this->expert->meets) ? $this->expert->meets : [];
        $events = [];
        $meetProcessor = new ExpertMeets();

        foreach ($meets as $meet) {
            $events[] = $meetProcessor->meet2event($meet);
        }

        return $events;
    }

}
