<?php

namespace app\modules\desk\controllers;

use app\modules\desk\models\search\StatTicketsSearch;
use Yii;
use app\modules\desk\models\Buildings;
use yii\db\StaleObjectException;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use app\modules\desk\models\forms\StatTicketForm;
use app\modules\desk\models\Places;
use app\modules\desk\models\ExpertGroups;

/**
 * Class StatTicketsController
 * @package app\modules\desk\controllers
 */
class StatTicketsController extends Controller
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
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new StatTicketsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single StatTicket model.
     * @param integer $id
     * @return mixed
     *
     * @throws NotFoundHttpException
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);
        $model->formatParams();
        $model->loadValues();
        return $this->render('view', [
            'model' => $model,
        ]);
    }

    /**
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {

        $model = new StatTicketForm();
        $model->formatParams();

        if ($model->load(Yii::$app->request->post()) && $model->saveForm()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }
        return $this->render('create', [
            'model' => $model,
            'availablePlaces' => Yii::$app->formatter->asPairs(Places::class),
            'availableExpertGroups' => Yii::$app->formatter->asPairs(ExpertGroups::class)
        ]);

    }

    /**
     * Updates an existing StatTicket model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     *
     * @throws NotFoundHttpException
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $model->formatParams();
        $model->loadValues();

        if ($model->load(Yii::$app->request->post()) && $model->saveForm()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }
        return $this->render('update', [
            'model' => $model,
            'availablePlaces' => Yii::$app->formatter->asPairs(Places::class),
            'availableExpertGroups' => Yii::$app->formatter->asPairs(ExpertGroups::class)
        ]);

    }

    /**
     * Deletes an existing StatTicket model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws StaleObjectException
     * @throws NotFoundHttpException
     * @throws \Exception
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }


    /**
     * Finds the Buildings model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Buildings the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = StatTicketForm::findOne($id)) !== null) {
            return $model;
        }
        throw new NotFoundHttpException('The requested page does not exist.');

    }


}
