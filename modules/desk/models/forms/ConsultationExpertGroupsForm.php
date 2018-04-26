<?php
namespace app\modules\desk\models\forms;

use app\modules\desk\models\ExpertGroups;
use Yii;

/**
 * Class ConsultationExpertGroupsForm
 * @package app\modules\desk\models\forms
 */
class ConsultationExpertGroupsForm extends ExpertGroups
{



    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            $this->type = ExpertGroups::TYPE_CONSULTATION;
            return true;
        }
        return false;
    }


}