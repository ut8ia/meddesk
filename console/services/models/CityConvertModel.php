<?php

namespace app\console\services\models;


use app\modules\desk\models\Cities;

/**
 * Class CityConvertModel
 * @package app\console\services\models
 */
class CityConvertModel extends Cities
{


    public $pattern;
    public $cleanName;


    const STATUS_PRIORITIES = [
        Cities::TYPE_UNKNOWN,
        Cities::TYPE_VILLAGE,
        Cities::TYPE_TOWN,
        Cities::TYPE_CITY
    ];

    public function clean()
    {
        $this->cleanName = preg_replace('/^' . $this->pattern . '/i', "", $this->name);
        $this->cleanName = preg_replace('/^\\./i', "", $this->cleanName);
        $this->cleanName = preg_replace('/^\\./i', "", $this->cleanName);
        $this->cleanName = trim($this->cleanName);
    }


    /**
     * @param CityConvertModel $city
     * @return $this|bool
     */
    public function liftUpType($city)
    {
        // same or max value
        if ($city->type === $this->type || $this->type === Cities::TYPE_CITY) {
            return $this;
        }

        $keyExist = array_search($this->type, self::STATUS_PRIORITIES);
        $keyNew = array_search($city->type, self::STATUS_PRIORITIES);

        if ($keyNew > $keyExist) {
            $this->type = self::STATUS_PRIORITIES[$keyNew];
            $this->save();
        }

        return $this;
    }

}