<?php

namespace app\modules\desk\services\datasource;


use app\modules\desk\models\ExpertGroups;
use app\modules\desk\models\Places;
use app\modules\desk\helpers\Converter;

/**
 * Class ExpertsData
 * @package app\modules\desk\services\datasource
 */
class ExpertsData
{


    /**
     * @param $expertId
     * @return mixed
     */
    public static function rpcPlaces($expertId)
    {
        $places = Places::find()
            ->joinWith('expertPlacesLink')
            ->where(['med_expert_places_link.expert_id' => $expertId])
            ->all();
        return Converter::formatRpcSelector($places);
    }

    /**
     * @param $expertId
     * @return mixed
     */
    public static function rpcExpertGroups($expertId)
    {
        $places = ExpertGroups::find()
            ->joinWith('expertGroupsLink')
            ->where(['med_expert_groups_link.expert_id' => $expertId])
            ->all();
        return Converter::formatRpcSelector($places);
    }


}