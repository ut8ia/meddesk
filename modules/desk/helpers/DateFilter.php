<?php

namespace app\modules\desk\helpers;

use Yii;

/**
 * Class DateFilter
 * @package app\modules\desk\helpers
 */
class DateFilter
{

    /**
     * @param $query
     * @param $from
     * @param $to
     * @param $property
     */
    public static function apply(&$query, $from, $to, $property)
    {

        $fromSet = (int)(bool) $from;
        $toSet = (int)(bool) $to;

        switch ($fromSet . $toSet) {
            case '00':
                break;
            case '01':
                $query->andFilterWhere([
                    '<=',
                    $property,
                    Yii::$app->time->datetime2db($to)
                ]);
                break;
            case "10":
                $query->andFilterWhere([
                    '>=',
                    $property,
                    Yii::$app->time->datetime2db($from)
                ]);
                break;
            case "11":
                $query->andFilterWhere([
                    'between',
                    $property,
                    Yii::$app->time->datetime2db($from),
                    Yii::$app->time->datetime2db($to)
                ]);
                break;
        }
    }
}

