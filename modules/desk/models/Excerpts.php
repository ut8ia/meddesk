<?php

namespace app\modules\desk\models;

use Yii;

/**
 * This is the model class for table "med_excerpts".
 *
 * @property int $id
 * @property int $course_id
 * @property int $patient_id
 * @property string $text
 * @property int $date
 */
class Excerpts extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'med_excerpts';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['course_id', 'patient_id', 'text', 'date'], 'required'],
            [['course_id', 'patient_id'], 'integer'],
            ['date', 'safe'],
            [['text'], 'string', 'max' => 1024],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'course_id' => Yii::t('app', 'Course ID'),
            'patient_id' => Yii::t('app', 'Patient ID'),
            'text' => Yii::t('app', 'Text'),
            'date' => Yii::t('app', 'Date'),
        ];
    }

    /** @return \yii\db\ActiveQuery */
    public function getCourses()
    {
        return $this->hasOne(Courses::class, ['id' => 'course_id']);
    }

    /** @return \yii\db\ActiveQuery */
    public function getPatients()
    {
        return $this->hasOne(Patients::class, ['id' => 'patient_id']);
    }

    /** @return \yii\db\ActiveQuery */
    public function getMeets()
    {
        return $this->hasMany(Meets::class, ['course_id' => 'course_id']);
    }

    /** linked relations */

    /** @return \yii\db\ActiveQuery */
    public function getExperts()
    {
        return $this->hasMany(Experts::class, ['id' => 'expert_id'])
            ->via('meets');
    }

    /** @return \yii\db\ActiveQuery */
    public function getExpertGroups()
    {
        return $this->hasMany(ExpertGroups::class, ['id' => 'expert_group_id'])
            ->via('meets');
    }


    /**
     * @return bool
     */
    public function canUpdate()
    {
        return true;
    }


}
