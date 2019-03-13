<?php

namespace app\modules\desk\models;

use Yii;

/**
 * This is the model class for table "med_forms".
 *
 * @property int $id
 * @property string $name
 *
 * @property FormParamsLink[] $medFormParamsLinks
 * @property FormParams[] $params
 * @property FormValues[] $medFormValues
 */
class Forms extends \yii\db\ActiveRecord
{

    const FORM_STAT_TICKET = 'statticketform';
    const FORM_PATIENTS = 'patientsform';

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'med_forms';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
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
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFormParamsLinks()
    {
        return $this->hasMany(FormParamsLink::class, ['form_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getParams()
    {
        return $this->hasMany(FormParams::class, ['id' => 'param_id'])
            ->viaTable('med_form_params_link', ['form_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFormValues()
    {
        return $this->hasMany(FormValues::class, ['form_id' => 'id']);
    }
}
