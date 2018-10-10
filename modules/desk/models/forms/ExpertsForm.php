<?php

namespace app\modules\desk\models\forms;

use app\modules\desk\models\ExpertGroups;
use app\modules\desk\models\Experts;
use app\modules\desk\models\ExpertsIdentity;
use app\modules\desk\models\Places;
use Yii;

/**
 * Class PlacesForm
 * @package app\modules\desk\models\forms
 */
class ExpertsForm extends Experts
{


    public $newPassword;

    public $role;

    public function formName()
    {
        return "expertsForm";
    }

    public function rules()
    {
        $rules = parent::rules();
        $rules[] = [['newPassword', 'role'], 'string'];
        return $rules;
    }

    public function formatParams()
    {
        $role = Yii::$app->authManager->getRolesByUser($this->id);
        if (!empty($role)) {
            $this->role = key($role);
        };
    }

    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            // if pass not empty - update it and set "must change" flag
            if (!empty($this->newPassword)) {
                $this->changePass();
            };
            return true;
        }
        return false;
    }

    public function afterSave($insert, $changedAttributes)
    {
        parent::afterSave($insert, $changedAttributes);

        //password
        if ($insert && !empty($this->newPassword)) {
            $this->changePass();
        }

        // rbac role change
        $roleExist = Yii::$app->authManager->getRolesByUser($this->id);

        if (empty($roleExist) || key($roleExist) !== $this->role) {
            Yii::$app->authManager->revokeAll($this->id);
            $role = Yii::$app->authManager->getRole($this->role);
            Yii::$app->authManager->assign($role, $this->id);
        }

        //places
        $this->unlinkAll('places', true);
        $places = Yii::$app->request->post()[$this->formName()]['places'];
        if (!empty($places)) {
            foreach ($places as $place) {
                $this->link('places', Places::findOne($place));
            }
        }

        // expert groups
        $this->unlinkAll('expertGroups', true);
        $groups = Yii::$app->request->post()[$this->formName()]['expertGroups'];
        if (!empty($groups)) {
            foreach ($groups as $group) {
                $this->link('expertGroups', ExpertGroups::findOne($group));
            }
        }

    }

    private function changePass()
    {
        if ($expertIdentity = ExpertsIdentity::findIdentity($this->id)) {
            $expertIdentity->setPassword($this->newPassword);
            $expertIdentity->password_change = ExpertsIdentity::PASSWORD_NEED_CHANGE;
            $expertIdentity->save();
        }
    }


}