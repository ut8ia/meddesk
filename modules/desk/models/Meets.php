<?php

namespace app\modules\desk\models;

use Yii;

/**
 * This is the model class for table "med_meets".
 *
 * @property int $id
 * @property int $expert_id
 * @property int $expert_group_id
 * @property int $patient_id
 * @property int $place_id
 * @property int $course_id
 * @property string $status
 * @property int $meet_type
 * @property int $for_excerpt
 * @property string $text
 * @property string $comment
 * @property string $plan_from
 * @property string $plan_to
 * @property string $time_from
 * @property string $time_to
 */
class Meets extends \yii\db\ActiveRecord
{

//    const TYPE_INITIAL = 'initial';
    const TYPE_CONSULTATION = 'consultation';
//    const TYPE_CONSILIUM = 'consilium';
    const TYPE_COURSE = 'course';
    const TYPE_URGENT = 'urgent'; // not need at rehabilitaion


    const STATUS_PLANNED = 'planned';
    const STATUS_DONE = 'done';
    const STATUS_REJECTED = 'rejected';

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'med_meets';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['expert_id', 'expert_group_id', 'patient_id', 'status', 'meet_type'], 'required'],
            [['expert_id', 'expert_group_id', 'patient_id', 'place_id', 'course_id', 'for_excerpt'], 'integer'],
            [['status', 'meet_type'], 'string'],
            [['plan_from', 'plan_to', 'time_from', 'time_to'], 'safe'],
            [['text'], 'string', 'max' => 1024],
            [['comment'], 'string', 'max' => 512],
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
            'place_id' => Yii::t('desk', 'Place ID'),
            'course_id' => Yii::t('desk', 'Course ID'),
            'status' => Yii::t('desk', 'Status'),
            'meet_type' => Yii::t('desk', 'Meet Type'),
            'for_excerpt' => Yii::t('desk', 'For Excerpt'),
            'text' => Yii::t('desk', 'Text'),
            'comment' => Yii::t('desk', 'Comment'),
            'time_from' => Yii::t('desk', 'Time From'),
            'time_to' => Yii::t('desk', 'Time To'),
            'patient_name'=> Yii::t('desk', 'Patient Name'),
        ];
    }

    /**
     * @return array
     */
    public function getStatuses()
    {
        return [
            self::STATUS_PLANNED => Yii::t('desk', self::STATUS_PLANNED),
            self::STATUS_DONE => Yii::t('desk', self::STATUS_DONE),
            self::STATUS_REJECTED => Yii::t('desk', self::STATUS_REJECTED)
        ];
    }


    /**
     * @return array
     */
    public function getMeetTypesSelector()
    {
        return [
            self::TYPE_CONSULTATION => Yii::t('desk', self::TYPE_CONSULTATION),
            self::TYPE_COURSE => Yii::t('desk', self::TYPE_COURSE),
            self::TYPE_URGENT => Yii::t('desk', self::TYPE_URGENT)
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
    public function getPlaces()
    {
        return $this->hasOne(Places::class, ['id' => 'place_id']);
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
    public function getExcerpts()
    {
        return $this->hasOne(Excerpts::class, ['course_id' => 'course_id']);
    }

    /**
     * @return bool
     */
    public function canUpdate()
    {
        return true;
    }

}
