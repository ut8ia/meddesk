<?php

namespace app\modules\desk\services\autocomplete;

use app\modules\desk\models\Experts;
use app\modules\desk\models\Patients;
use Yii;

class Autocomplete
{

    /**
     * @param $request
     * @param int $limit
     * @return array|null
     */
    public static function patientAutocomplete($request, $limit = 25)
    {
        $found = Patients::find()
            ->where(['like', 'surname', $request])
            ->all();

        if (!$found) {
            return null;
        }

        $ans = [];
        $c = 0;
        foreach ($found as $model) {
            $ans[$c]['id'] = $model->id;
            $ans[$c]['label'] = Yii::$app->formatter->asObject(['object' => $model, 'view' => 'search_result']);
            $c++;
        }
        return $ans;

    }


    /**
     * @param $request
     * @param int $limit
     * @return array|null
     */
    public static function expertAutocomplete($request, $limit = 25)
    {
        $found = Experts::find()
            ->where(['like', 'surname', $request])
            ->all();

        if (!$found) {
            return null;
        }

        $ans = [];
        $c = 0;
        foreach ($found as $model) {
            $ans[$c]['id'] = $model->id;
            $ans[$c]['label'] = Yii::$app->formatter->asObject(['object' => $model, 'view' => 'search_result']);
            $c++;
        }
        return $ans;

    }


}