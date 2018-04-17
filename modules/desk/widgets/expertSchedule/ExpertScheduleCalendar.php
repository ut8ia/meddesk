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
    public $expertId;
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

        $meetProcessor = new ExpertMeets();
        return $meetProcessor->findCalendarMeets($this->expertId);
    }

}
