<?php

namespace app\modules\desk\models\forms;

use app\modules\desk\models\DiagnosesAppointments;
use app\modules\desk\models\Forms;
use app\modules\desk\models\Meets;
use app\modules\desk\models\Patients;
use app\modules\desk\services\datasource\PatientsData;
use app\modules\desk\services\former\Former;
use Yii;
use yii\base\Model;

/**
 * Class StatTicketForm
 * @package app\modules\desk\models\forms
 * @property Former $former
 *
 * @property string $birthdate
 * @property string $ticketResult
 */
class StatTicketForm extends Meets
{

//    public $expert_id;
//    public $expert_group_id;
//    public $place_id;
//
//    public $patient_id;
    public $name;
    public $surname;
    public $patronymic;
    public $card_number;
    public $birthdate;
    public $sex;
    public $phone;
    public $region_id;

    public $city;
    public $address;
//    public $city_id;

    public $patient_name;
    public $expert_name;

    // specific ticket form params


    public $isFromCity;

//    public $firstMeet;
//    public $firstMeetInYear;
    public $directedFrom;
    public $meetReason;

    public $diagnose_id;
    public $diagnoseEquality;
    public $illState;
    public $ticketResult;

    public $former;


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'surname', 'patronymic', 'sex', 'birthdate', 'address', 'region_id',
                'expert_id', 'expert_name', 'expert_group_id', 'time_from',
                'diagnose_id', 'directedFrom', 'diagnoseEquality', 'meetReason', 'illState'
            ], 'required'],
            [['expert_id', 'expert_group_id', 'patient_id', 'place_id'], 'integer'],
            [['name', 'surname', 'patronymic'], 'string', 'max' => 255],
            [['card_number'], 'string', 'max' => 8],
            [['sex', 'status', 'meet_type'], 'string'],
            ['phone', 'string', 'max' => 16],
            [['birthdate', 'ticketResult'], 'safe'],
            ['address', 'string', 'max' => 128],
            [['city'], 'string'],
            [['comment'], 'string', 'max' => 512],
        ];
    }


    /**
     * @return string
     */
    public function formName()
    {
        return Forms::FORM_STAT_TICKET;
    }


    public function formatParams()
    {

        $this->former = new Former($this->formName(), $this->id);

        if ($this->id) {
            $this->loadPatientData();
        }
        else{
            $this->loadDefaultFormData();
        }


        $this->time_from = Yii::$app->time->datetime2front($this->time_from);

        $this->patient_name = Yii::$app->formatter
            ->asObject([
                'object' => $this->patients,
                'view' => 'search_result'
            ]);

        $this->expert_name = Yii::$app->formatter
            ->asObject([
                'object' => $this->experts,
                'view' => 'search_result'
            ]);

    }


    private function loadPatientData()
    {
        $this->surname = $this->patients->surname;
        $this->name = $this->patients->name;
        $this->patronymic = $this->patients->patronymic;
        $this->birthdate = $this->patients->birthdate;
        $this->sex = $this->patients->sex;
        $this->card_number = $this->patients->card_number;
        $this->address = $this->patients->address;
        $this->region_id = $this->patients->region_id;
        $this->phone = $this->patients->phone;
        $this->diagnose_id = PatientsData::patientDiagnoseId($this->patient_id);

    }

    private function loadDefaultFormData(){
        $this->first_meet = true;
        $this->first_meet_in_year = true;
    }

    public function loadValues()
    {
        $this->former->findFormValues();
        $this->isFromCity = $this->former->findValue('isFromCity');
        $this->directedFrom = $this->former->findValue('directedFrom');
        $this->meetReason = $this->former->findValue('meetReason');
        $this->diagnoseEquality = $this->former->findValue('diagnoseEquality');
        $this->illState = $this->former->findValue('illState');
        $this->ticketResult = json_decode($this->former->findValue('ticketResult'));

//        $this->firstMeet = (bool)PatientsData::patientMeets($this->patient_id, null, $this->id);
//        $this->firstMeetInYear = (bool)PatientsData::patientMeets($this->patient_id, date('Y-01-01'), $this->id);

    }


    public function beforeSave($insert)
    {

        if (parent::beforeSave($insert)) {
            $this->time_from = Yii::$app->time->datetime2db($this->time_from);
            return true;
        }
        return false;
    }


    /**
     * @return bool
     */
    public function saveForm()
    {

        $this->status = Meets::STATUS_DONE;
        $this->meet_type = Meets::TYPE_CONSULTATION;

        if (!$this->validate()) {
            return false;
        }

        // detect and create new patient
        if (!$this->patient_id) {
            $patient = $this->makePatient();
            if (!$patient->id) {
                return false;
            }
            $this->patient_id = $patient->id;
        }


        if ($this->save()) {
            $this->checkMainDiagnose();
            return $this->saveParams();
        }

    }


    /**
     * @return Patients
     */
    private function makePatient()
    {
        $patient = new Patients();
        $patient->name = $this->name;
        $patient->surname = $this->surname;
        $patient->patronymic = $this->patronymic;
        $patient->sex = $this->sex;
        $patient->birthdate = Yii::$app->time->date2db($this->birthdate);
        $patient->phone = $this->phone;
        $patient->address = $this->address;
        $patient->region_id = $this->region_id;
        $patient->card_number = PatientsData::makeCardNumber($patient);
        $patient->user_id = time();
        $patient->district_a = "00";
//        $patient->validate();
//        dd($patient->errors);
        $patient->save();
        return $patient;
    }

    /**
     * @return bool
     */
    private function saveParams()
    {

        $this->isFromCity = $this->former->saveValue('isFromCity', $this->isFromCity, $this->id);
        $this->directedFrom = $this->former->saveValue('directedFrom', $this->directedFrom, $this->id);
        $this->meetReason = $this->former->saveValue('meetReason', $this->meetReason, $this->id);
        $this->diagnoseEquality = $this->former->saveValue('diagnoseEquality', $this->diagnoseEquality, $this->id);
        $this->illState = $this->former->saveValue('illState', $this->illState, $this->id);
        $this->ticketResult = $this->former->saveValue('ticketResult', json_encode($this->ticketResult), $this->id);

        return true;
    }


    /**
     *
     */
    private function checkMainDiagnose()
    {


        $appointmment = DiagnosesAppointments::find()
            ->where(['patient_id' => $this->patient_id])
            ->andWhere(['appointment_type' => DiagnosesAppointments::TYPE_MAIN])
            ->one();
        if (!$appointmment) {
            $appointmment = new DiagnosesAppointments();
        }
        $appointmment->patient_id = $this->patient_id;
        $appointmment->expert_group_id = $this->expert_group_id;
        $appointmment->expert_id = $this->expert_id;
        $appointmment->appointment_type = DiagnosesAppointments::TYPE_MAIN;
        $appointmment->diagnoses_id = $this->diagnose_id;
        $appointmment->date = Yii::$app->time->datetime2db(time());
        $appointmment->text = $this->formName();
        $appointmment->save();

    }

}