<?php

namespace app\modules\desk\services\reports\common;

use Yii;
use app\modules\desk\models\Meets;
use app\modules\desk\services\reports\BaseReport;

class ExpertMeetsCounters extends BaseReport
{

    public $expert_id;

    public $from;
    public $to;


    public function getDone()
    {

        return Meets::find()
            ->where(['expert_id'=>$this->expert_id])
            ->andWhere(['status'=>Meets::STATUS_DONE])
            ->all();

    }


}

