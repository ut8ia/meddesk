<?php

namespace app\modules\desk\models;

use Yii;

/**
 * This is the model class for table "med_form_values".
 *
 * @property int $form_id
 * @property int $param_id
 * @property int $meet_id
 * @property string $value
 *
 * @property Forms $form
 * @property Meets $meet
 * @property FormParams $param
 */
class FormValues extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'med_form_values';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['form_id', 'param_id', 'meet_id'], 'required'],
            [['form_id', 'param_id', 'meet_id'], 'integer'],
            [['value'], 'string', 'max' => 255],
            [['form_id', 'param_id', 'meet_id'], 'unique', 'targetAttribute' => ['form_id', 'param_id', 'meet_id']],
            [['form_id'], 'exist', 'skipOnError' => true, 'targetClass' => Forms::class, 'targetAttribute' => ['form_id' => 'id']],
            [['meet_id'], 'exist', 'skipOnError' => true, 'targetClass' => Meets::class, 'targetAttribute' => ['meet_id' => 'id']],
            [['param_id'], 'exist', 'skipOnError' => true, 'targetClass' => FormParams::class, 'targetAttribute' => ['param_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'form_id' => Yii::t('desk', 'Form ID'),
            'param_id' => Yii::t('desk', 'Param ID'),
            'meet_id' => Yii::t('desk', 'Meet ID'),
            'value' => Yii::t('desk', 'Value'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getForm()
    {
        return $this->hasOne(Forms::class, ['id' => 'form_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMeet()
    {
        return $this->hasOne(Meets::class, ['id' => 'meet_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getParam()
    {
        return $this->hasOne(FormParams::class, ['id' => 'param_id']);
    }
}
