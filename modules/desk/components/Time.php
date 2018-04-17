<?php

namespace app\modules\desk\components;

use yii\base\Component;
use Yii;

class Time extends Component
{

    public $timeZone = 'UTC';
    public $dateFormat = 'Y-m-d';
    public $dateJsFormat = 'dd-m-yyyy';
    public $datetimeJsFormat = 'dd-m-yyyy hh:ii';
    public $dateFormatDb = 'Y-m-d';
    public $datetimeFormat = 'Y-m-d H:i:s';
    public $datetimeFormatDb = 'Y-m-d H:i:s';

    public $timestamp;
    public $date;
    public $dateDb;
    public $datetime;
    public $datetimeDb;

    public function init()
    {
        date_default_timezone_set($this->timeZone);
        Yii::$app->db->createCommand("SET time_zone = '{$this->timeZone}'")->execute();

        $this->timestamp = time();
        $this->date = $this->makeDate();
        $this->dateDb = $this->makeDateDb();
        $this->datetime = $this->makeDatetime();
        $this->datetimeDb = $this->makeDatetimeDb();
        parent::init();
    }

    /**
     * @param null|integer $timestamp
     * @return string
     */
    public function makeDate($timestamp = null)
    {
        $timestamp = $timestamp ?: $this->timestamp;
        return date($this->dateFormat, $timestamp);
    }

    /**
     * @param null|integer $timestamp
     * @return string
     */
    public function makeDateDb($timestamp = null)
    {
        $timestamp = $timestamp ?: $this->timestamp;
        return date($this->dateFormatDb, $timestamp);
    }

    /**
     * @param null|integer $timestamp
     * @return string
     */
    public function makeDatetime($timestamp = null)
    {
        $timestamp = $timestamp ?: $this->timestamp;
        return date($this->datetimeFormat, $timestamp);
    }

    /**
     * @param null|integer $timestamp
     * @return string
     */
    public function makeDatetimeDb($timestamp = null)
    {
        $timestamp = $timestamp ?: $this->timestamp;
        return date($this->datetimeFormatDb, $timestamp);
    }

    /**
     * @param string $date
     * @return string
     */
    public function date2db($date)
    {
        return $this->makeDateDb(strtotime($date));
    }


    /**
     * @param string $datetime
     * @return string
     */
    public function datetime2db($datetime)
    {

        return $this->makeDatetimeDb(strtotime($datetime));
    }


    /**
     * @param string $date
     * @return string
     */
    public function date2front($date)
    {
        return $this->makeDate(strtotime($date));
    }


    /**
     * @param string $datetime
     * @return string
     */
    public function datetime2front($datetime)
    {
        return $this->makeDatetime(strtotime($datetime));
    }


    /**
     * @param integer $days
     * @return integer
     */
    public function rewDaysTimestamp($days)
    {
        return $this->timestamp + (($days) * 86400);
    }

    /**
     * @param integer $days
     * @return string
     */
    public function rewDaysDate($days)
    {
        return date($this->dateFormat, $this->rewDaysTimestamp($days));
    }

    /**
     * @param integer $days
     * @return string
     */
    public function rewDaysDateDb($days)
    {
        return date($this->dateFormatDb, $this->rewDaysTimestamp($days));
    }

    /**
     * @param integer $days
     * @return string
     */
    public function rewDaysDatetime($days)
    {
        return date($this->datetimeFormat, $this->rewDaysTimestamp($days));
    }

    /**
     * @param integer $days
     * @return string
     */
    public function rewDaysDatetimeDb($days)
    {
        return date($this->datetimeFormatDb, $this->rewDaysTimestamp($days));
    }


}