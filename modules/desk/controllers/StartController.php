<?php

namespace app\modules\desk\controllers;

use app\modules\desk\models\Meets;
use app\modules\desk\models\Patients;
use app\modules\desk\services\statistic\Statistic;
use Yii;
use yii\web\Controller;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;


class StartController extends Controller
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
     * @return string
     */
    public function actionIndex()
    {
        $dataSource = new Statistic();
        return $this->render('index',
            [
                'patientsCount' => count($dataSource->patients()),
                'patientsMale' => count($dataSource->patientsBySex(Patients::SEX_MALE)),
                'patientsFemale' => count($dataSource->patientsBySex(Patients::SEX_FEMALE)),
                'patientsMeets' => count($dataSource->patientsMeets(Meets::STATUS_DONE)),
                'patientsFinishedCourses' => count($dataSource->excerpts()),
                'patientsPlannedMeets' => count($dataSource->patientsMeets(Meets::STATUS_PLANNED)),
                'myPatientsToday' => count(Yii::$app->expert->findMeets([
                    'and',
                    ['=', 'status', Meets::STATUS_PLANNED],
                    ['>=', 'time_from', Yii::$app->time->dateDb],
                    ['<', 'time_to', Yii::$app->time->rewDaysDateDb(1)]
                ])),
                'myPatientsTomorrow' => count(Yii::$app->expert->findMeets([
                        'and',
                        ['=', 'status', Meets::STATUS_PLANNED],
                        ['>=', 'time_from', Yii::$app->time->rewDaysDateDb(1)],
                        ['<', 'time_to', Yii::$app->time->rewDaysDateDb(2)]
                    ]
                ))

            ]
        );
    }

}
