<?php
namespace app\modules\desk\models\forms;

use app\modules\desk\models\Courses;
use Yii;

/**
 * Class CoursesForm
 * @package app\modules\desk\models\forms
 */
class CoursesForm extends Courses
{

    public function formatParams()
    {
        $this->date_start = Yii::$app->time->date2front($this->date_start);
        $this->date_end = Yii::$app->time->date2front($this->date_end);
    }

    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            $this->date_start = Yii::$app->time->date2db($this->date_start);
            $this->date_end = Yii::$app->time->date2db($this->date_end);
            return true;
        }
        return false;
    }


}