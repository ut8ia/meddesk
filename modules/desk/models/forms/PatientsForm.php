<?php

namespace app\modules\desk\models\forms;

use app\modules\desk\models\Patients;
use Yii;

/**
 * Class PatientsForm
 * @package app\modules\desk\models\forms
 */
class PatientsForm extends Patients
{

    public $patient_name;

    public function formatParams()
    {
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
            return true;
        }
        return false;
    }


}