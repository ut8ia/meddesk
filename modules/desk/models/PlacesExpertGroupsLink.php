<?php

namespace app\modules\desk\models;

use Yii;

/**
 * This is the model class for table "med_places_expert_groups_link".
 *
 * @property int $id
 * @property int $place_id
 * @property int $expert_group_id
 */
class PlacesExpertGroupsLink extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'med_places_expert_groups_link';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['place_id', 'expert_group_id'], 'required'],
            [['place_id', 'expert_group_id'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'place_id' => Yii::t('app', 'Place ID'),
            'expert_group_id' => Yii::t('app', 'Expert Group ID'),
        ];
    }

    /** @return \yii\db\ActiveQuery */
    public function getPlaces()
    {
        return $this->hasOne(Places::class, ['id' => 'place_id']);
    }


    /** @return \yii\db\ActiveQuery */
    public function getExpertGroups()
    {
        return $this->hasOne(ExpertGroups::class, ['id' => 'expert_group_id']);
    }


}
