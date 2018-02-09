<?php

namespace app\modules\desk\models\forms;

use app\modules\desk\models\Meets;
use Yii;

/**
 * Class MeetsForm
 * @package app\modules\desk\models\forms
 */
class MeetsForm extends Meets
{

    public $patient_name;
    public $expert_name;


    public function formatParams()
    {
        $this->plan_from = Yii::$app->time->datetime2front($this->plan_from);
        $this->plan_to = Yii::$app->time->datetime2front($this->plan_to);

        $this->time_from = Yii::$app->time->datetime2front($this->time_from);
        $this->time_to = Yii::$app->time->datetime2front($this->time_to);

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

    /**
     * @param bool $insert
     * @return bool
     */
    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            $this->plan_from = Yii::$app->time->date2db($this->plan_from);
            $this->plan_to = Yii::$app->time->date2db($this->plan_to);
            return true;
        }
        return false;
    }



}