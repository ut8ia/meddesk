<?php

namespace app\modules\desk\models;

use Yii;

/**
 * This is the model class for table "med_expert_groups_link".
 *
 * @property int $id
 * @property int $expert_group_id
 * @property int $expert_id
 */
class ExpertGroupsLink extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'med_expert_groups_link';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['expert_group_id', 'expert_id'], 'required'],
            [['expert_group_id', 'expert_id'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'expert_group_id' => Yii::t('app', 'Expert group ID'),
            'expert_id' => Yii::t('app', 'Expert ID'),
        ];
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
