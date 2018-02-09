<?php

namespace app\modules\desk\models\forms;

use app\modules\desk\models\CoursesList;
use Yii;

/**
 * Class CoursesListForm
 * @package app\modules\desk\models\forms
 * @property string $patient_name
 */
class CoursesListForm extends CoursesList
{

    public $patient_name;

    public function formatParams()
    {
        $this->date_from = Yii::$app->time->date2front($this->date_from);
        $this->date_to = Yii::$app->time->date2front($this->date_to);
        $this->patient_name = Yii::$app->formatter
            ->asObject([
                'object' => $this->patients,
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
            $this->date_from = Yii::$app->time->date2db($this->date_from);
            $this->date_to = Yii::$app->time->date2db($this->date_to);
            return true;
        }
        return false;
    }


}