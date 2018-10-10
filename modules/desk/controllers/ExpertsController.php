<?php

namespace app\modules\desk\controllers;

use app\modules\desk\models\ExpertGroups;
use app\modules\desk\models\forms\ExpertsForm;
use app\modules\desk\models\Places;
use Yii;
use app\modules\desk\models\search\ExpertsSearch;
use yii\base\InvalidArgumentException;
use yii\base\InvalidParamException;
use yii\db\StaleObjectException;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * ExpertsController implements the CRUD actions for Experts model.
 */
class ExpertsController extends Controller
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
        $searchModel = new ExpertsSearch();
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
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Experts model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     *
     */
    public function actionCreate()
    {
        $model = new ExpertsForm();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        }

        $model->formatParams();

        return $this->render('create', [
            'model' => $model,
            'availablePlaces' => Yii::$app->formatter->asPairs(Places::class),
            'availableExpertGroups' => Yii::$app->formatter->asPairs(ExpertGroups::class)
        ]);

    }

    /**
     * Updates an existing Experts model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     *
     * @throws NotFoundHttpException
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        }

        $model->formatParams();

        return $this->render('update', [
            'model' => $model,
            'availablePlaces' => Yii::$app->formatter->asPairs(Places::class),
            'availableExpertGroups' => Yii::$app->formatter->asPairs(ExpertGroups::class)
        ]);

    }

    /**
     * Deletes an existing Experts model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws StaleObjectException
     * @throws NotFoundHttpException
     * @throws \Exception
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->softDelete();

        return $this->redirect(['index']);
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
        if (($model = ExpertsForm::findOne($id)) !== null) {
            return $model;
        }
        throw new NotFoundHttpException('The requested page does not exist.');

    }
}
