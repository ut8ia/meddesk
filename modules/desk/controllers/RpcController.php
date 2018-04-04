<?php

namespace app\modules\desk\controllers;

use app\modules\desk\services\autocomplete\Autocomplete;
use app\modules\desk\services\datasource\ExpertsData;
use app\modules\desk\services\datasource\meets\ExpertMeets;
use app\modules\desk\services\datasource\meets\PatientMeets;
use yii\web\Controller;
use nizsheanez\jsonRpc\Action;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;


/**
 * RPC Controller handle remote procedure calls
 */
class RpcController extends Controller
{

    /**
     * @return array
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
            'access' => [
                'class' => AccessControl::class,
                'rules' => [
                    [
                        'allow' => false,
                        'roles' => ['?'],
                    ],
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

    /**
     * @return array
     */
    public function actions()
    {
        return [
            'jsonrpc' => [
                'class' => Action::class
            ],
        ];
    }

    /**
     * @param $request
     * @return array
     */
    public function patientsAutocomplete($request)
    {
        return ['response_list' => Autocomplete::patientAutocomplete($request)];
    }

    /**
     * @param integer $patientId
     * @return array
     */
    public function patientMeets($patientId)
    {
        $meets = new PatientMeets();
        return $meets->findCalendarMeets($patientId);
    }


    /**
     * @param $request
     * @return array
     */
    public function expertsAutocomplete($request)
    {
        return ['response_list' => Autocomplete::expertAutocomplete($request)];
    }


    /**
     * @param integer $expertId
     * @return array
     */
    public function meetsExpert($expertId)
    {
        $meets = new ExpertMeets();
        return [
            'places' => ExpertsData::rpcPlaces($expertId),
            'expertGroups' => ExpertsData::rpcExpertGroups($expertId),
            'expertMeets' => $meets->findCalendarMeets($expertId)
        ];
    }


}
