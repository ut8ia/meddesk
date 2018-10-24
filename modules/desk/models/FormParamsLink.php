<?php

namespace app\modules\desk\models;

use Yii;

/**
 * This is the model class for table "med_form_params_link".
 *
 * @property int $form_id
 * @property int $param_id
 * @property int $order_num
 *
 * @property Forms $form
 * @property FormParams $param
 */
class FormParamsLink extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'med_form_params_link';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['form_id', 'param_id', 'order_num'], 'required'],
            [['form_id', 'param_id', 'order_num'], 'integer'],
            [['form_id', 'param_id'], 'unique', 'targetAttribute' => ['form_id', 'param_id']],
            [['form_id'], 'exist', 'skipOnError' => true, 'targetClass' => Forms::class, 'targetAttribute' => ['form_id' => 'id']],
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
            'order_num' => Yii::t('desk', 'Order Num'),
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
    public function getParam()
    {
        return $this->hasOne(FormParams::class, ['id' => 'param_id']);
    }
}
