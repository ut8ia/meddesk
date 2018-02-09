<?php

namespace app\modules\desk\controllers;

use app\modules\desk\models\forms\MymeetsForm;
use app\modules\desk\models\search\MymeetsSearch;
use Yii;
use yii\web\Controller;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use app\modules\desk\models\Places;
use app\modules\desk\models\ExpertGroups;
/**
 * Class MymeetsController
 * @package app\modules\desk\controllers
 */
class MymeetsController extends Controller
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
     * Lists all Meets models.
     * @return mixed
     * @throws InvalidParamException
     */
    public function actionIndex()
    {
        $searchModel = new MymeetsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Meets model.
     * @param integer $id
     * @return mixed
     * @throws InvalidParamException
     * @throws NotFoundHttpException
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Meets model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     * @throws InvalidParamException
     */
    public function actionCreate()
    {
        $model = new MymeetsForm();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }
        return $this->render('create', [
            'model' => $model,
            'availablePlaces' => Yii::$app->formatter->asPairs(Places::class),
            'availableExpertGroups' => Yii::$app->formatter->asPairs(ExpertGroups::class)
        ]);

    }

    /**
     * Updates an existing Meets model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws InvalidParamException
     * @throws NotFoundHttpException
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        $model->formatParams();
        return $this->render('update', [
            'model' => $model,
            'availablePlaces' => Yii::$app->formatter->asPairs(Places::class),
            'availableExpertGroups' => Yii::$app->formatter->asPairs(ExpertGroups::class)
        ]);

    }

    /**
     * Deletes an existing Meets model.
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
     * Finds the Meets model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return MeetsForm the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = MymeetsForm::findOne($id)) !== null) {
            return $model;
        }
        throw new NotFoundHttpException('The requested page does not exist.');

    }

}
