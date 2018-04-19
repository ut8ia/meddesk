<?php

namespace app\modules\desk\services\datasource\meets;

use app\modules\desk\models\Meets;
use yii2fullcalendar\models\Event;
use Yii;

/**
 * Class ExpertMeets
 * @package app\modules\desk\services\datasource\meets
 */
class ExpertMeets
{

    /**
     * @param $patientId
     * @return array
     */
    public function findCalendarMeets($expertId)
    {
        $meets = Meets::find()
            ->with('expertGroups')
            ->where(['expert_id' => $expertId])
            ->all();

        $events = [];

        foreach ($meets as $meet) {
            $events[] = $this->meet2event($meet);
        }

        return $events;
    }


    /**
     * @param Meets $meet
     * @return Event
     */
    public function meet2event($meet)
    {
        $event = new Event();
        $event->id = $meet->id;
        $event->title = Yii::$app->formatter->asObject(
            [
                'object' => $meet->patients,
                'view' => 'default'
            ]);
        $event->start = $meet->plan_from;
        $event->end = $meet->plan_to ?: null;
//        $event->backgroundColor = $meet->expertGroups->display_color;
        return $event;
    }


}