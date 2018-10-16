<?php


namespace app\console\controllers;

use app\modules\desk\models\Experts;
use app\services\rbac\Permissions;
use app\services\rbac\Roles;
use Yii;
use yii\console\Controller;

class RbacController extends Controller
{


    public function actionInit()
    {
        $auth = Yii::$app->authManager;

        // roles
        $tech = $auth->createRole(Roles::ROLE_TECH);
        $manager = $auth->createRole(Roles::ROLE_MANGER);
        $admin = $auth->createRole(Roles::ROLE_ADMIN);
        $doctor = $auth->createRole(Roles::ROLE_DOCTOR);
        $stuff = $auth->createRole(Roles::ROLE_STUFF);

        $auth->add($tech);
        $auth->add($manager);
        $auth->add($admin);
        $auth->add($doctor);
        $auth->add($stuff);

        //permissions
        $schedule = $auth->createPermission(Permissions::PERMISSION_SCHEDULE);
        $meet = $auth->createPermission(Permissions::PERMISSION_MEET);
        $patients = $auth->createPermission(Permissions::PERMISSION_PATIENTS);
        $manage = $auth->createPermission(Permissions::PERMISSION_MANAGE);
        $settings = $auth->createPermission(Permissions::PERMISSION_SETTINGS);
        $statistic = $auth->createPermission(Permissions::PERMISSION_STATISTIC);
        $debug = $auth->createPermission(Permissions::PERMISSION_DEBUG);

        $auth->add($schedule);
        $auth->add($meet);
        $auth->add($patients);
        $auth->add($manage);
        $auth->add($settings);
        $auth->add($statistic);
        $auth->add($debug);

        // permissions to roles
        //stuff
        $auth->addChild($stuff, $schedule);
        $auth->addChild($stuff, $patients);
        //doctor
        $auth->addChild($doctor, $schedule);
        $auth->addChild($doctor, $patients);
        $auth->addChild($doctor, $meet);
        //admin
        $auth->addChild($admin, $schedule);
        $auth->addChild($admin, $patients);
        $auth->addChild($admin, $manage);
        $auth->addChild($admin, $settings);
        $auth->addChild($admin, $statistic);
        //manager
        $auth->addChild($manager, $schedule);
        $auth->addChild($manager, $meet);
        $auth->addChild($manager, $patients);
        $auth->addChild($manager, $manage);
        $auth->addChild($manager, $settings);
        $auth->addChild($manager, $statistic);
        // tech
        $auth->addChild($tech, $schedule);
        $auth->addChild($tech, $meet);
        $auth->addChild($tech, $patients);
        $auth->addChild($tech, $manage);
        $auth->addChild($tech, $settings);
        $auth->addChild($tech, $statistic);
        $auth->addChild($tech, $debug);

    }


    /**
     * make all user - stuff roles
     */
    public function actionAssign()
    {

        $auth = Yii::$app->authManager;
        $exp = Experts::find()->all();

        $role = $auth->getRole(Roles::ROLE_STUFF);

        foreach ($exp as $item) {
            $auth->assign($role, $item->id);
        }


    }

}