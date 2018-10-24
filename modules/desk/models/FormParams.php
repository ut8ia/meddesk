<?php

namespace app\modules\desk\models;

use Yii;

/**
 * This is the model class for table "med_form_params".
 *
 * @property int $id
 * @property string $name
 * @property string $label
 * @property string $type
 * @property string $default
 * @property string $options
 * @property int $min
 * @property int $max
 *
 * @property FormParamsLink[] $medFormParamsLinks
 * @property Forms[] $forms
 * @property FormValues[] $medFormValues
 */
class FormParams extends \yii\db\ActiveRecord
{

    /**
     *  stat ticket form
     */
    const isFromCity = 'isFromCity';
    const directedFrom = 'directedFrom';
    const meetReason = 'meetReason';
    const diagnoseEquality = 'diagnoseEquality';
    const illState = 'illState';
    const ticketResult ='ticketResult';


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'med_form_params';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'label', 'type', 'default'], 'required'],
            [['type'], 'string'],
            [['min', 'max'], 'integer'],
            [['name'], 'string', 'max' => 32],
            [['label'], 'string', 'max' => 128],
            [['default'], 'string', 'max' => 255],
            [['options'], 'string', 'max' => 512],
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
            'label' => Yii::t('desk', 'Label'),
            'type' => Yii::t('desk', 'Type'),
            'default' => Yii::t('desk', 'Default'),
            'options' => Yii::t('desk', 'Options'),
            'min' => Yii::t('desk', 'Min'),
            'max' => Yii::t('desk', 'Max'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFormParamsLinks()
    {
        return $this->hasMany(FormParamsLink::class, ['param_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getForms()
    {
        return $this->hasMany(Forms::class, ['id' => 'form_id'])
            ->viaTable('med_form_params_link', ['param_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFormValues()
    {
        return $this->hasMany(FormValues::class, ['param_id' => 'id']);
    }


    /**
     * @return array|mixed
     */
    public function makeOptionsArray()
    {
        $out = json_decode($this->options, true);
        return is_array($out) ? $this->translateLabels($out) : [];
    }


    /**
     * @param $options
     * @return array
     */
    private function translateLabels($options)
    {
        $out = [];
        foreach ($options as $ind => $option) {
            $out[$ind] = Yii::t('params', $option);
        }

        return $out;
    }

}
