<?php

namespace app\modules\desk\models;

use Yii;

/**
 * This is the model class for table "med_courses".
 *
 * @property int $id
 * @property int $number
 * @property string $date_start
 * @property string $date_end
 * @property string $status
 */
class Courses extends \yii\db\ActiveRecord
{

    const STATUS_PLANNED = 'planned';
    const STATUS_OPEN = 'open';
    const STATUS_PENDING = 'pending';
    const STATUS_CLOSED = 'closed';

    /**
     * @return array
     */
    public static function getStatuses()
    {
        return [

            self::STATUS_PLANNED => Yii::t('desk', 'planned'),
            self::STATUS_OPEN => Yii::t('desk', 'open'),
            self::STATUS_PENDING => Yii::t('desk', 'pending'),
            self::STATUS_CLOSED => Yii::t('desk', 'closed')
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'med_courses';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['number', 'date_start', 'date_end', 'status'], 'required'],
            [['number'], 'integer'],
            [['date_start', 'date_end'], 'safe'],
            [['status'], 'string'],
            [['number'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('desk', 'ID'),
            'number' => Yii::t('desk', 'Number'),
            'date_start' => Yii::t('desk', 'Date Start'),
            'date_end' => Yii::t('desk', 'Date End'),
            'status' => Yii::t('desk', 'Status'),
        ];
    }

    /** @return \yii\db\ActiveQuery */
    public function getMeets()
    {
        return $this->hasMany(Meets::class, ['course_id' => 'id']);
    }

    /** @return \yii\db\ActiveQuery */
    public function getCoursesList()
    {
        return $this->hasMany(CoursesList::class, ['course_id' => 'id']);
    }

    /** @return \yii\db\ActiveQuery */
    public function getExcerpts()
    {
        return $this->hasMany(Excerpts::class, ['course_id' => 'id']);
    }

    /** linked relations */

    /** @return \yii\db\ActiveQuery */
    public function getPatients()
    {
        return $this->hasMany(Patients::class, ['id' => 'patient_id'])
            ->via('coursesList');
    }


    /**
     * @return array|\yii\db\ActiveRecord[]
     */
    public static function findOpen()
    {
        return self::find()
            ->where(['status' => self::STATUS_OPEN])
            ->all();
    }

}
