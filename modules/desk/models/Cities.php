<?php

namespace app\modules\desk\models;

use Yii;

/**
 * This is the model class for table "med_cities".
 *
 * @property int $id
 * @property string $name
 * @property string $type
 * @property int $region_id
 */
class Cities extends \yii\db\ActiveRecord
{

    const TYPE_CITY = 'city';
    const TYPE_TOWN = 'town';
    const TYPE_VILLAGE = 'village';
    const TYPE_UNKNOWN = 'unknown';

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'med_cities';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'type', 'region_id'], 'required'],
            [['type'], 'string'],
            [['region_id'], 'integer'],
            [['type', 'name', 'region_id'], 'unique', 'targetAttribute' => ['type', 'name', 'region_id']],
            [['name'], 'string', 'max' => 64],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('desk', 'ID'),
            'name' => Yii::t('desk', 'Name'),
            'type' => Yii::t('desk', 'Type'),
            'region_id' => Yii::t('desk', 'Region ID'),
        ];
    }

    /**
     * @return array
     */
    public static function getTypes()
    {
        return [
            self::TYPE_CITY => Yii::t('desk', 'city'),
            self::TYPE_TOWN => Yii::t('desk', 'town'),
            self::TYPE_VILLAGE => Yii::t('desk', 'village'),
            self::TYPE_UNKNOWN => Yii::t('desk', 'unknown')
        ];
    }


    /** @return \yii\db\ActiveQuery */
    public function getRegion()
    {
        return $this->hasOne(Regions::class, ['id' => 'region_id']);
    }

}
