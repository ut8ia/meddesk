<?php

namespace app\modules\desk\models;

use Yii;

/**
 * This is the model class for table "med_expert_patients_link".
 *
 * @property int $id
 * @property int $expert_id
 * @property int $expert_group_id
 * @property int $patient_id
 */
class ExpertPatientsLink extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'med_expert_patients_link';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['expert_id', 'expert_group_id', 'patient_id'], 'required'],
            [['expert_id', 'expert_group_id', 'patient_id'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('desk', 'ID'),
            'expert_id' => Yii::t('desk', 'Expert ID'),
            'expert_group_id' => Yii::t('desk', 'Expert Group ID'),
            'patient_id' => Yii::t('desk', 'Patient ID'),
        ];
    }

    /** @return \yii\db\ActiveQuery */
    public function getExperts()
    {
        return $this->hasOne(Experts::class, ['id' => 'expert_id']);
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


}
