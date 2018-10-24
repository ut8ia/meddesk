<?php

namespace app\modules\desk\services\datasource;

use app\modules\desk\models\DiagnosesAppointments;
use app\modules\desk\models\Meets;
use app\modules\desk\models\Patients;
use app\modules\desk\models\Regions;
use Yii;

/**
 * Class PatientsData
 * @package app\modules\desk\services\datasource
 */
class PatientsData
{


    /**
     * @param $patientId
     * @return array|null|\yii\db\ActiveRecord
     */
    public static function patientProfile($patientId)
    {

        $p = Patients::find($patientId)
            ->with('diagnosesAppointments', 'meets')
            ->andWhere(['id' => $patientId])
            ->one();

        if (isset($p->attributes)) {
            $p->birthdate = Yii::$app->time->date2front($p->birthdate);
            return $p->attributes;
        }
    }

    /**
     * @param integer $patientId
     * @param null $timeFrom
     * @param null $meetId - to escape current
     * @return array|\yii\db\ActiveRecord[]
     */
    public static function patientMeets($patientId, $timeFrom = null, $meetId = null)
    {

        return Meets::find()
            ->where(['patient_id' => $patientId])
            ->andFilterWhere(['>', 'time_from', $timeFrom])
            ->andFilterWhere(['!=', 'id', $meetId])
            ->all();

    }

    /**
     * @param $patientId
     * @return mixed
     */
    public static function patientDiagnoseId($patientId)
    {
        $ans = null;

        $appointment = DiagnosesAppointments::find()
            ->where(['patient_id' => $patientId])
            ->andWhere(['appointment_type' => DiagnosesAppointments::TYPE_MAIN])
            ->one();

        if ($appointment) {
            $ans = $appointment->diagnoses_id;
        }

        return $ans;
    }


    /**
     * card number : 19-1007 next in 19 region = 19-1008
     * @param Patients $patient
     */
    public static function makeCardNumber($patient)
    {
        $lastPatient = Patients::find()
            ->where(['region_id' => $patient->region_id])
            ->orderBy(['id' => SORT_DESC])
            ->one();

        $num = explode('-', $lastPatient->card_number);
        return $patient->region_id . '-' . ((int)$num[1] + 1);

    }

}