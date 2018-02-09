<?php

namespace app\modules\desk\widgets\patientSearch;

use yii\base\Widget;

/**
 * Class PatientSearchWidget
 * @package app\modules\desk\widgets\patientSearch
 */
class PatientSearchWidget extends Widget
{

    public $model;
    public $form;
    public $type = 'patientSearch';

    public function run()
    {
        return $this->render($this->type,
            [
                'model' => $this->model,
                'form' => $this->form,
            ]);
    }

}
