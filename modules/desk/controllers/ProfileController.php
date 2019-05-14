<?php

namespace app\modules\desk\controllers;

use app\modules\desk\helpers\Theme;
use yii\web\Controller;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use Yii;

/**
 * Class ProfileController
 * @package app\modules\desk\controllers
 */
class ProfileController extends Controller
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
        return $this->render('index');
    }

    /**
     * @param $theme
     * @return string
     */
    public function actionSetTheme($theme)
    {

        Theme::setTheme($theme);
        return $this->redirect(Yii::$app->request->referrer);

    }

}
