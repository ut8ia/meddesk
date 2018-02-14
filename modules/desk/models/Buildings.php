<?php

namespace app\modules\desk\models;

use Yii;

/**
 * This is the model class for table "med_buildings".
 *
 * @property int $id
 * @property string $name
 * @property string $adress
 * @property double $lattitude
 * @property double $longitude
 * @property int $floors
 */
class Buildings extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'med_buildings';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'adress', 'floors'], 'required'],
            [['lattitude', 'longitude'], 'number'],
            [['id', 'floors'], 'integer'],
            [['name'], 'string', 'max' => 64],
            [['adress'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('desk', 'ID'),
            'name' => Yii::t('desk', 'Name'),
            'adress' => Yii::t('desk', 'Adress'),
            'lattitude' => Yii::t('desk', 'Lattitude'),
            'longitude' => Yii::t('desk', 'Longitude'),
            'floors' => Yii::t('desk', 'Floors'),
        ];
    }


    /** @return \yii\db\ActiveQuery */
    public function getPlaces()
    {
        return $this->hasMany(Places::class, ['building_id' => 'id']);
    }

    /** linked relations  */

    /** @return \yii\db\ActiveQuery */
    public function getExpertPlacesLink()
    {
        return $this->hasMany(ExpertPlacesLink::class, ['place_id' => 'id'])
            ->via('places');
    }

    /** @return \yii\db\ActiveQuery */
    public function getExperts()
    {
        return $this->hasMany(Experts::class, ['id' => 'expert_id'])
            ->via('expertPlacesLink');
    }



    /**
     * makes array N=>N  max value is highest floor in building
     * @return array
     */
    public function findFloors()
    {
        $c = $this->floors;
        $out = [];
        while ($c) {
            $out[$c] = $c;
            $c--;
        }
        return $out;
    }


}
