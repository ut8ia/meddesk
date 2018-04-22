<?php
namespace app\modules\desk\models\forms;

use app\modules\desk\models\ExpertGroups;
use Yii;

/**
 * Class RehabilitationExpertGroupsForm
 * @package app\modules\desk\models\forms
 */
class RehabilitationExpertGroupsForm extends ExpertGroups
{



    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            $this->type = ExpertGroups::TYPE_REHABILITATION;
            return true;
        }
        return false;
    }


}