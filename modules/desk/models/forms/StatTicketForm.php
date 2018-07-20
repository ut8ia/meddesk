<?php

namespace app\modules\desk\models\forms;

use Yii;
use yii\base\Model;

/**
 * Class CoursesForm
 * @package app\modules\desk\models\forms
 */
class StatTicketForm extends Model
{

    public $expert_id;
    public $expert_group_id;
    public $place_id;

    public $patient_id;
    public $name;
    public $surname;
    public $patronymic;
    public $card_number;
    public $birthdate;
    public $sex;
    public $address;
    public $city;

//    public $city_id;


    public $patient_name;
    public $expert_name;


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
//            [['name', 'surname', 'patronymic', 'card_number', 'sex', 'birthdate', 'region_id', 'district_a', 'user_id'], 'required'],
            [['name', 'surname', 'patronymic'], 'string', 'max' => 255],
            [['card_number'], 'string', 'max' => 8],
            [['sex'], 'string'],
            [['birthdate'], 'safe'],
            ['address', 'string', 'max' => 128],
            [['city'], 'string'],
        ];
    }


    public function formatParams()
    {
        $this->patient_name = Yii::$app->formatter
            ->asObject([
                'object' => $this->patients,
                'view' => 'search_result'
            ]);

        $this->expert_name = Yii::$app->formatter
            ->asObject([
                'object' => $this->experts,
                'view' => 'search_result'
            ]);

    }


}