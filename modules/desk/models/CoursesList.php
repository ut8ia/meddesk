<?php

namespace app\modules\desk\models;

use Yii;

/**
 * This is the model class for table "med_courses_list".
 *
 * @property int $id
 * @property int $course_id
 * @property int $patient_id
 * @property string $status
 * @property string $date_from
 * @property string $date_to
 * @property string $comment
 */
class CoursesList extends \yii\db\ActiveRecord
{

    const STATUS_IN_LIST = 'in_list';
    const STATUS_RESERVE = 'reserve';
    const STATUS_REJECTED = 'rejected';
    const STATUS_PLANNED = 'planned';
    const STATUS_REQUEST = 'request';

    /**
     * @return array
     */
    public static function getStatuses()
    {
        return [
            self::STATUS_IN_LIST => Yii::t('desk', 'in list'),
            self::STATUS_RESERVE => Yii::t('desk', 'reserved'),
            self::STATUS_PLANNED => Yii::t('desk', 'planned'),
            self::STATUS_REQUEST => Yii::t('desk', 'request'),
            self::STATUS_REJECTED => Yii::t('desk', 'rejected')
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'med_courses_list';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['course_id', 'patient_id', 'status', 'date_from', 'date_to'], 'required'],
            [['course_id', 'patient_id'], 'integer'],
            [['status'], 'string'],
            [['date_from', 'date_to'], 'safe'],
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
            'course_id' => Yii::t('desk', 'Course ID'),
            'patient_id' => Yii::t('desk', 'Patient ID'),
            'status' => Yii::t('desk', 'Status'),
            'date_from' => Yii::t('desk', 'Date From'),
            'date_to' => Yii::t('desk', 'Date To'),
            'comment' => Yii::t('desk', 'Comment'),
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

    /**
     * @return bool
     */
    public function canUpdate()
    {
        return in_array($this->courses->status, [Courses::STATUS_OPEN, Courses::STATUS_PENDING]);
    }


}
