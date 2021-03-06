<?php

namespace app\modules\desk\models;

use Yii;

/**
 * This is the model class for table "med_places".
 *
 * @property int $id
 * @property string $number // because number can be like 7A not only 7
 * @property string $name
 * @property integer $building_id
 * @property integer $floor
 * @property string $description
 */
class Places extends \yii\db\ActiveRecord
{
    /**
     * @return string
     */
    public static function tableName()
    {
        return 'med_places';
    }

    /**
     * @return array
     */
    public function rules()
    {
        return [
            [['number', 'name', 'floor', 'building_id'], 'required'],
            ['number', 'string', 'max' => 6],
            [['name'], 'string', 'max' => 255],
            [['floor', 'building_id', 'id'], 'integer'],
            [['description'], 'string', 'max' => 512],
        ];
    }

    /**
     * @return array
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('desk', 'ID'),
            'name' => Yii::t('desk', 'Name'),
            'building_id' => Yii::t('desk', 'Building'),
            'floor' => Yii::t('desk', 'Floor'),
            'description' => Yii::t('desk', 'Description'),
        ];
    }


    /** @return \yii\db\ActiveQuery */
    public function getBuildings()
    {
        return $this->hasOne(Buildings::class, ['id' => 'building_id']);
    }


    /** @return \yii\db\ActiveQuery */
    public function getMeets()
    {
        return $this->hasMany(Meets::class, ['place_id' => 'id']);
    }


    /** @return \yii\db\ActiveQuery */
    public function getExpertPlacesLink()
    {
        return $this->hasMany(ExpertPlacesLink::class, ['place_id' => 'id']);
    }

    /** @return \yii\db\ActiveQuery */
    public function getPlacesExpertGroupsLink()
    {
        return $this->hasMany(PlacesExpertGroupsLink::class, ['place_id' => 'id']);
    }

    /** @return \yii\db\ActiveQuery */
    public function getScheduleTemplates()
    {
        return $this->hasMany(ScheduleTemplates::class, ['place_id' => 'id']);
    }

    /** @return \yii\db\ActiveQuery */
    public function getSchedule()
    {
        return $this->hasMany(Schedule::class, ['place_id' => 'id']);
    }


    /** linked relations  */

    /** @return \yii\db\ActiveQuery */
    public function getExperts()
    {
        return $this->hasMany(Experts::class, ['id' => 'expert_id'])
            ->via('expertPlacesLink');
    }

    /** @return \yii\db\ActiveQuery */
    public function getExpertsGroups()
    {
        return $this->hasMany(ExpertGroups::class, ['id' => 'expert_group_id'])
            ->via('placesExpertGroupsLink');
    }

}
