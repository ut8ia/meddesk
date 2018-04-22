<?php

namespace app\modules\desk\services\reports;

use DateTime;

class BaseReport
{


    /** @var DateTime */
    protected $firstTimelinePoint;
    /** @var DateTime */
    protected $lastTimelinePoint;


    /**
     * Sets the value for the start point of the report time scale
     * @param $time date/time string according to http://php.net/manual/ru/datetime.formats.php
     * @return ReportBuilder
     */
    public function setFirstTimelinePoint($time)
    {
        $this->firstTimelinePoint = new DateTime($time);
        return $this;
    }

    /**
     * @return DateTime
     */
    protected function getFirstTimelinePoint()
    {
        if (empty($this->firstTimelinePoint)) {
            $this->firstTimelinePoint = new DateTime('60 days ago');
        }
        return $this->firstTimelinePoint;
    }

    /**
     * Sets the value for the start point of the report time scale
     * @param $time date/time string according to http://php.net/manual/ru/datetime.formats.php
     * @return ReportBuilder
     */
    public function setLastTimelinePoint($time)
    {
        $this->lastTimelinePoint = new DateTime($time);
        return $this;
    }

    /**
     * @return DateTime
     */
    protected function getLastTimelinePoint()
    {
        if (empty($this->lastTimelinePoint)) {
            $this->lastTimelinePoint = new DateTime('now');
        }
        return $this->lastTimelinePoint;


    }

}