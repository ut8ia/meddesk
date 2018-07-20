<?php

namespace app\console\services;

use app\console\services\models\CityConvertModel;
use app\modules\desk\models\Cities;
use app\modules\desk\models\Patients;

class CityConvert
{

    /** @var Patients[] */
    private $patients = [];

    /** @var array @var CityConvertModel[] */
    private $cities = [];


    private $typePatterns = [
        Cities::TYPE_CITY => ['м\\.', 'м\\,', 'м \\.', 'м\s', 'м\\.\s', 'м\\,\s', 'г\\.', 'г \\.', 'г\s', 'г\\.\s'],
        Cities::TYPE_TOWN => ['пгт', 'пгт\s', 'пгт\\.\s', 'пгт\\.', 'пгт\s', 'пгт\\.\s', 'п\\.г\\.т\\.', 'п\\.г\\.т\\.\s',
            'п\\.г\\.т', 'п\\.г\\.т\s',
            'смт', 'смт\s', 'смт\\.\s', 'смт\\.', 'смт\s', 'см\\.т\\.\s',
            'с\\.\sм\\.т\\.', 'с\\.\sм\\.\sт\\.', 'с\\.\sм\\.\sт\\.\s', 'см\т\s'],
        Cities::TYPE_VILLAGE => ['с\s', 'с\\.', 'с \\.', 'с \\,', 'с\\,\s', 'с\\.\s', 'сел\s', 'сел\\.', 'сел\\.\s', 'селищ\\.\s', 'селище\s', 'село\s', 'сіло\s'],
    ];


    /**
     *
     */
    public function convert()
    {


        $patients = Patients::find()
            ->where(['!=', 'city', ''])
//            ->andWhere(['!=', 'region_id', 0])
            ->all();

        $c = 0;

        foreach ($patients as $patient) {
            /** @var  $patient Patients */

            $name = trim(mb_strtolower($patient->city));
            $city = $this->resolveType($name);
            $city->region_id = $patient->region_id;
            $city->clean();
            $city->name = $city->cleanName;

            if (!$exist = $this->checkCity($city)) {
                if($city->save()) {
                    $patient->city_id = $city->id;
                }
                else{
                    continue;
                }
            }

            else {
                $patient->city_id = $exist->id;
            }

            $patient->save();

            $c++;
            echo $c . " | " . $city->type . " | " . $city->name . " | " . $city->cleanName . " | " . $city->pattern . "|";
            echo PHP_EOL;

        }


    }


    /**
     * @param $name
     * @return CityConvertModel
     */
    private function resolveType($name)
    {
        $city = New CityConvertModel();

        foreach ($this->typePatterns as $type => $patterns) {
            foreach ($patterns as $pattern) {

                if (preg_match('/^' . $pattern . '/i', $name)) {
                    $city->type = $type;
                    $city->pattern = $pattern;
                    $city->name = $name;
                    return $city;
                }
            }
        }

        $city->type = 'unknown';
        $city->pattern = '';
        $city->name = $name;
        return $city;

    }


    /**
     * @param CityConvertModel $city
     * @return array|null|\yii\db\ActiveRecord
     */
    private function checkCity($city)
    {
        $exist = CityConvertModel::find()
            ->where(['name' => $city->name])
            ->andWhere(['region_id' => $city->region_id])
            ->one();

        if ($exist) {
            return $exist->liftUpType($city);
        }

        return $exist;
    }


}