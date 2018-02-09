<?php

namespace app\modules\desk\models;

use Yii;

/**
 * This is the model class for table "med_schedule".
 *
 * @property int $id
 * @property int $expert_id
 * @property int $expert_group_id
 * @property int $place_id
 * @property int $meet_type_id
 * @property string $time_from
 * @property string $time_to
 * @property string $comment
 */
class Schedule extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'med_schedule';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['expert_id', 'expert_group_id', 'place_id', 'meet_type_id', 'time_from', 'time_to', 'comment'], 'required'],
            [['expert_id', 'expert_group_id', 'place_id', 'meet_type_id'], 'integer'],
            [['time_from', 'time_to'], 'safe'],
            [['comment'], 'string', 'max' => 512],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'expert_id' => Yii::t('app', 'Expert ID'),
            'expert_group_id' => Yii::t('app', 'Expert Group ID'),
            'place_id' => Yii::t('app', 'Place ID'),
            'meet_type_id' => Yii::t('app', 'Meet Type ID'),
            'time_from' => Yii::t('app', 'Time From'),
            'time_to' => Yii::t('app', 'Time To'),
            'comment' => Yii::t('app', 'Comment'),
        ];
    }

    /** @return \yii\db\ActiveQuery */
    public function getPlaces()
    {
        return $this->hasOne(Places::class, ['id' => 'place_id']);
    }

    /** @return \yii\db\ActiveQuery */
    public function getMeetTypes()
    {
        return $this->hasOne(MeetTypes::class, ['id' => 'meet_type_id']);
    }

    /** @return \yii\db\ActiveQuery */
    public function getExpertGroups()
    {
        return $this->hasOne(ExpertGroups::class, ['id' => 'expert_group_id']);
    }

    /** @return \yii\db\ActiveQuery */
    public function getExperts()
    {
        return $this->hasOne(Experts::class, ['id' => 'expert_id']);
    }


}
