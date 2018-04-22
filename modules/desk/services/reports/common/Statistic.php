<?php

namespace app\modules\desk\services\reports\common;

use app\modules\desk\models\CoursesList;
use app\modules\desk\models\Excerpts;
use app\modules\desk\models\Meets;
use app\modules\desk\models\Patients;

/**
 * Class Statistic
 * @property integer $patients
 * @property integer $excerpts
 * @property integer $meets
 * @property integer $courseListPlanned
 */
class Statistic
{

    public $patients;
    public $excerpts;
    public $meets;
    public $courseListPlanned;

    public function makeReport()
    {
        $this->patients = Patients::find()->count();
        $this->excerpts = Excerpts::find()->count();
        $this->meets = Meets::find()->where(['status' => Meets::STATUS_DONE])->count();
        $this->courseListPlanned = CoursesList::find()->where(['status' => CoursesList::STATUS_PLANNED])->count();
    }


}