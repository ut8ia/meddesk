<?php

namespace app\modules\desk\controllers;

use app\modules\desk\models\forms\ExpertsForm;
use app\modules\desk\services\reports\models\Regions;
use app\modules\desk\services\reports\models\search\RegionsSearch;
use Yii;
use yii\base\InvalidArgumentException;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * Class StatregionsController
 * @package app\modules\desk\controllers
 */
class StatregionsController extends Controller
{
    /**
     * @inheritdoc
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
     * Lists all Experts models.
     * @return mixed
     *
     */
    public function actionIndex()
    {
        $searchModel = new RegionsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Experts model.
     * @param integer $id
     * @return mixed
     *
     * @throws NotFoundHttpException
     * @throws InvalidArgumentException
     */
    public function actionReport($id)
    {
        return $this->render('report', [
            'model' => $this->findModel($id),
        ]);
    }


    public function actionMeetsgraph($id)
    {
        return $this->render('meetsgraph', [
            'model' => $this->findModel($id),
        ]);
    }


    /**
     * Finds the Experts model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return ExpertsForm the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Regions::findOne($id)) !== null) {
            return $model;
        }
        throw new NotFoundHttpException('The requested page does not exist.');

    }
}
