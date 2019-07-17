<?php

namespace app\modules\desk\models;

use Yii;

/**
 * This is the model class for table "med_districts".
 *
 * @property int $id
 * @property string $name
 * @property int $region_id
 */
class Districts extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'med_districts';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'region_id'], 'required'],
            [['region_id'], 'integer'],
            [['name'], 'string', 'max' => 32],
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
            'region_id' => Yii::t('desk', 'Region ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRegion()
    {
        return $this->hasOne(Regions::class, ['id' => 'region_id']);
    }
}
