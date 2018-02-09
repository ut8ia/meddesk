<?php

namespace app\modules\desk\models;

use Yii;

/**
 * This is the model class for table "med_schedule_exception_days".
 *
 * @property int $id
 * @property string $date
 * @property string $comment
 */
class ScheduleExceptionDays extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'med_schedule_exception_days';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['date', 'comment'], 'required'],
            [['date'], 'safe'],
            [['comment'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'date' => Yii::t('app', 'Date'),
            'comment' => Yii::t('app', 'Comment'),
        ];
    }
}
