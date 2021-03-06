<?php

namespace app\modules\desk\services\reports\models;

use app\modules\desk\models\Regions as RegionsBase;
use app\modules\desk\models\Patients;

class Regions extends RegionsBase
{


    public $ages = [];

    /**
     * @return int
     */
    public function getTotal()
    {
        $count = count($this->patients);
        $this->makeAges();

        return $count;
    }


    private function makeAges()
    {
        /** @var Patients $patient */
        foreach ($this->patients as $patient) {

            $birthDate = explode("-", $patient->birthdate);
            //get age from date or birthdate
            $age = (date("md", date("U", mktime(0, 0, 0, $birthDate[2], $birthDate[1], $birthDate[1]))) > date("md")
                ? ((date("Y") - $birthDate[0]) - 1)
                : (date("Y") - $birthDate[0]));
            if (!isset($this->ages[$age])) {
                $this->ages[$age] = 1;
            } else {
                $this->ages[$age]++;
            }
        }
        return count($this->patients);

    }

    /**
     * @param int $from
     * @param int $to
     * @return int
     */
    public function getAge($from, $to)
    {
        $count = 0;

        if (!empty($this->ages)) {
            $end = $to ?: max(array_flip($this->ages));
        } else {
            $end = 0;
        }

        for ($i = $from; $i <= $end; $i++) {
            if (isset($this->ages[$i])) {
                $count += $this->ages[$i];
            }
        }

        return $count;
    }

}

