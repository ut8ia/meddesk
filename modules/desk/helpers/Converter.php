<?php

namespace app\modules\desk\helpers;
use Yii;

class Converter
{


    /**
     * @param array $pairs
     * @return array|null
     */
    public static function separatePairs($pairs)
    {
        if (empty($pairs)) {
            return null;
        }
        $out = [];
        foreach ($pairs as $index => $value) {
            $out[] = ['id' => $index, 'name' => $value];
        }
        return $out;
    }


    /**
     * @param $objArray
     * @return mixed
     */
    public static function formatSelector($objArray)
    {
        return Yii::$app->formatter->asObjectPairs(
            $objArray,
            'id',
            ['view' => 'selector']
        );
    }


    /**
     * @param $objArray
     * @return mixed
     */
    public static function formatRpcSelector($objArray)
    {
        return self::separatePairs(self::formatSelector($objArray));
    }

}