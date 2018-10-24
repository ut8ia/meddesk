<?php

namespace app\modules\desk\services\former;


use app\modules\desk\models\FormParams;
use app\modules\desk\models\Forms;
use app\modules\desk\models\FormValues;

/**
 * Class Former
 * @package app\modules\desk\services\former
 */
class Former
{

    private $formName;
    private $form;
    private $params = [];

    private $meetId;
    private $values = [];


    public function __construct($formName, $meetId = null)
    {
        $this->formName = $formName;
        $this->meetId = $meetId;
        $this->findFormParams();
    }

    private function findFormParams()
    {
        $this->form = Forms::find()
            ->where(['name' => $this->formName])
            ->with('params')
            ->one();

        if (!isset($this->form->params)) {
            return null;
        }

        //store to local array indexed by name for easy access
        foreach ($this->form->params as $param) {
            /** @var FormParams $param */
            $this->params[$param->name] = $param;
        }

    }


    public function findFormValues()
    {

        $values = FormValues::find()
            ->with('param')
            ->where(['form_id' => $this->form->id])
            ->andWhere(['meet_id' => $this->meetId])
            ->all();

        if (!$values) {
            return null;
        }

        foreach ($values as $value) {
            $this->values[$value->param->name] = $value;
        }

    }

    /**
     * @param $name
     * @return null
     */
    public function findValue($name)
    {
        $value = null;
        if (isset($this->values[$name])) {
            $value = $this->values[$name]->value;
        }
        return $value;
    }


    /**
     * @param $name
     * @param $value
     * @return bool
     */
    public function saveValue($name, $value, $meetId)
    {

        if (isset($this->values[$name])) {
            $this->values[$name]->value = $value;
            $result = $this->values[$name]->save();
        } else {
            $formValue = new FormValues();
            $formValue->form_id = $this->form->id;
            $formValue->param_id = $this->findParam($name)->id;
            $formValue->meet_id = $meetId;
            $formValue->value = $value;
            $result = $formValue->save();
        }
        return $result;
    }

    /**
     * @param string $name
     * @return FormParams
     */
    public function findParam($name)
    {
        return isset ($this->params[$name]) ? $this->params[$name] : new FormParams();
    }


}