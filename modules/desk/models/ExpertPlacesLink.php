<?php

namespace app\modules\desk\models;

use Yii;

/**
 * This is the model class for table "med_expert_places_link".
 *
 * @property int $id
 * @property int $expert_id
 * @property int $place_id
 */
class ExpertPlacesLink extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'med_expert_places_link';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['expert_id', 'place_id'], 'required'],
            [['expert_id', 'place_id'], 'integer'],
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
            'place_id' => Yii::t('desk', 'Place ID'),
        ];
    }

    /** @return \yii\db\ActiveQuery */
    public function getExperts()
    {
        return $this->hasOne(Experts::class, ['id' => 'expert_id']);
    }

    /** @return \yii\db\ActiveQuery */
    public function getPlaces()
    {
        return $this->hasOne(Places::class, ['id' => 'place_id']);
    }

}
