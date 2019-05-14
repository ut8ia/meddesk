<?php

namespace app\modules\desk\helpers;

use Yii;

class Theme
{

    const THEMES = [
        "skin-blue",
        "skin-black",
        "skin-red",
        "skin-yellow",
        "skin-purple",
        "skin-green",
        "skin-blue-light",
        "skin-black-light",
        "skin-red-light",
        "skin-yellow-light",
        "skin-purple-light",
        "skin-green-light"
    ];

    public static function setTheme($theme)
    {
        if(!in_array($theme, self::THEMES)){
            return null;
        }

        Yii::$app->user->identity->theme = $theme;
        Yii::$app->user->identity->save();
    }

    public static function getTheme(){
        return Yii::$app->user->identity->theme ? : "skin-blue";
    }


}
