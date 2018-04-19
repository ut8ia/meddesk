<?php

namespace app\console\controllers;
use app\console\services\PatientImport;
use yii\console\Controller;

class  ImportController extends Controller
{


    public function actionPatients()
    {
        $import = new PatientImport();
        $import->import();


    }


}


?>

