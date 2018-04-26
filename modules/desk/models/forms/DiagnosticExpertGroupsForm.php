<?php

namespace app\modules\desk\models\forms;

use app\modules\desk\models\ExpertGroups;
use Yii;

/**
 * Class DiagnosticExpertGroupsForm
 * @package app\modules\desk\models\forms
 */
class DiagnosticExpertGroupsForm extends ExpertGroups
{

    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            $this->type = ExpertGroups::TYPE_DIAGNOSTIC;
            return true;
        }
        return false;
    }


}