<?php

namespace app\modules\desk\models\forms;

use app\console\services\CityConvert;
use app\modules\desk\models\Forms;
use app\modules\desk\models\Patients;
use app\modules\desk\services\datasource\PatientsData;
use app\modules\desk\services\former\Former;
use Yii;

/**
 * Class PatientsForm
 * @package app\modules\desk\models\forms
 */
class PatientsForm extends Patients
{

    public $patient_id;
    public $patient_name;

    public $former;

    public $city_type;

    /**
     * @return string
     */
    public function formName()
    {
        return Forms::FORM_PATIENTS;
    }

    public function formatParams()
    {
        $this->former = new Former($this->formName(), $this->id);

//        if ($this->id) {
//            $this->loadPatientData();
//        } else {
//            $this->loadDefaultFormData();
//        }


        $this->birthdate = Yii::$app->time->date2front($this->birthdate);
//        $this->patient_name = Yii::$app->formatter
//            ->asObject([
//                'object' => $this->patients,
//                'view' => 'search_result'
//            ]);
    }

    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            $this->birthdate = Yii::$app->time->date2db($this->birthdate);
            $this->name = mb_convert_case($this->name, MB_CASE_TITLE, 'UTF-8');
            $this->surname = mb_convert_case($this->surname, MB_CASE_TITLE, 'UTF-8');
            $this->patronymic = mb_convert_case($this->patronymic, MB_CASE_TITLE, 'UTF-8');

            return true;
        }
        return false;
    }

    /**
     *
     */
    public function saveForm()
    {
        $this->card_number = PatientsData::makeCardNumber($this);
        $this->user_id = time();
        $this->district_a = "00";

        if ($this->validate()) {
            $convertor = new CityConvert();
            $convertor->convertPatient($this);
            return true;
        }
        return false;
    }

}