<?php

namespace app\console\controllers;
use app\console\services\CityConvert;
use yii\console\Controller;

/**
 * Class CityConvertController
 * @package app\console\controllers
 */
class  CityConvertController extends Controller
{


    /**
     * CONVERT EXISTING USERS CITY DATA
     */
    public function actionCity()
    {
       $convertor = new CityConvert();
       $convertor->convert();

    }




}


?>

