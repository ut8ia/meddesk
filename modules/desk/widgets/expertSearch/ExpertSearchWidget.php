<?php

namespace app\modules\desk\widgets\expertSearch;

use yii\base\Widget;

/**
 * Class ExpertSearchWidget
 * @package app\modules\desk\widgets\expertSearch
 */
class ExpertSearchWidget extends Widget
{

    public $model;
    public $form;
    public $type = 'expertSearch';

    public function run()
    {
        return $this->render($this->type,
            [
                'model' => $this->model,
                'form' => $this->form,
            ]);
    }

}
