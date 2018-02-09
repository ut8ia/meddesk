<?php

namespace app\modules\desk\models;

use Yii;

/**
 * This is the model class for table "med_meet_types".
 *
 * @property int $id
 * @property int $name
 */
class MeetTypes extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'med_meet_types';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
        ];
    }



    /** @return \yii\db\ActiveQuery */
    public function getMeets()
    {
        return $this->hasMany(Meets::class, ['meet_type_id'=>'id']);
    }


    /** @return \yii\db\ActiveQuery */
    public function getSchedule()
    {
        return $this->hasMany(Schedule::class, ['meet_type_id'=>'id']);
    }


}
