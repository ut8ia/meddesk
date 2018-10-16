<?php

namespace app\services\rbac;

use Yii;

class MenuHelper
{


    /**
     * each menu item must contain 'access' property
     * @param array $menu
     * @return array
     */
    public static function allow($menu)
    {

        $out = [];
        foreach ($menu as $item) {
            if (isset($item['permission']) && (Yii::$app->user->can($item['permission']) || $item['permission'] === Permissions::PERMISSION_ALL)) {
                $out[] = $item;
            }

        }
        return $out;
    }


}