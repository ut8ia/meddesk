<?php

namespace app\modules\desk\models;

use Yii;

/**
 * This is the model class for table "med_diagnoses_appointments".
 *
 * @property int $id
 * @property int $patient_id
 * @property int $expert_id
 * @property int $expert_group_id
 * @property int $diagnoses_id
 * @property string $appointment_type
 * @property string $date
 * @property string $text
 */
class DiagnosesAppointments extends \yii\db\ActiveRecord
{

    const TYPE_MAIN = 'main';
    const TYPE_ADDITIONAL = 'additional';
    const TYPE_SUPPOSED = 'supposed';

    /**
     * @return array
     */
    public static function getTypes()
    {
        return [
            self::TYPE_MAIN => Yii::t('desk', 'main'),
            self::TYPE_ADDITIONAL => Yii::t('desk', 'additional'),
            self::TYPE_SUPPOSED => Yii::t('desk', 'supposed')
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'med_diagnoses_appointments';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['patient_id', 'diagnoses_id', 'appointment_type'], 'required'],
            [['patient_id', 'expert_id', 'expert_group_id', 'diagnoses_id'], 'integer'],
            [['appointment_type'], 'string'],
            [['date'], 'safe'],
            [['text'], 'string', 'max' => 512],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('desk', 'ID'),
            'patient_id' => Yii::t('desk', 'Patient ID'),
            'expert_id' => Yii::t('desk', 'Expert ID'),
            'expert_group_id' => Yii::t('desk', 'Expert Group ID'),
            'diagnoses_id' => Yii::t('desk', 'Diagnoses ID'),
            'appointment_type' => Yii::t('desk', 'Appointment Type'),
            'date' => Yii::t('desk', 'Date'),
            'text' => Yii::t('desk', 'Text'),
        ];
    }

    /** @return \yii\db\ActiveQuery */
    public function getExpertGroups()
    {
        return $this->hasOne(ExpertGroups::class, ['id' => 'expert_group_id']);
    }

    /** @return \yii\db\ActiveQuery */
    public function getPatients()
    {
        return $this->hasOne(Patients::class, ['id' => 'patient_id']);
    }

    /** @return \yii\db\ActiveQuery */
    public function getDiagnoses()
    {
        return $this->hasOne(Diagnoses::class, ['id' => 'diagnoses_id']);
    }

    /** @return \yii\db\ActiveQuery */
    public function getExperts()
    {
        return $this->hasOne(Experts::class, ['id' => 'expert_id']);
    }

}
