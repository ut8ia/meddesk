<?php

namespace app\modules\desk\models;

use Yii;

/**
 * This is the model class for table "med_regions".
 *
 * @property int $id
 * @property string $name
 * @property string $card_chars
 */
class Regions extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'med_regions';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 32],
            [['card_chars'], 'string', 'max' => 12],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'card_chars' => 'Card chars',
        ];
    }


    /** @return \yii\db\ActiveQuery */
    public function getCities()
    {
        return $this->hasMany(Cities::class, ['region_id' => 'id']);
    }


    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPatients()
    {
        return $this->hasMany(Patients::class, ['region_id' => 'id']);
    }


    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDisricts()
    {
        return $this->hasMany(Districts::class, ['region_id' => 'id']);
    }

}
