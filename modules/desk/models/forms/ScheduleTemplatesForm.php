<?php

namespace app\modules\desk\models\forms;

use app\modules\desk\models\ScheduleTemplates;
use Yii;
use yii\helpers\ArrayHelper;

class ScheduleTemplatesForm extends ScheduleTemplates
{
    public $expert_name;

    public function formatParams()
    {
//        $this->date = Yii::$app->time->date2front($this->date);

        $this->patient_name = Yii::$app->formatter
            ->asObject([
                'object' => $this->experts,
                'view' => 'search_result'
            ]);
    }

    public function getExpertGroupsSelector()
    {
        return [];
//        ArrayHelper::map($this->expert->expert_groups,'id','name');
    }

//
//    public function beforeSave($insert)
//    {
//        if (parent::beforeSave($insert)) {
//            $this->date = Yii::$app->time->date2db($this->date);
//            return true;
//        }
//        return false;
//    }

}
