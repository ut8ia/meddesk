<?php

namespace app\modules\desk\services\reports\common;

use app\modules\desk\models\Meets;
use app\modules\desk\models\Patients;
use app\modules\desk\services\reports\BaseReport;

class CommonReport extends BaseReport
{


    public $dateFormat = 'Y';
//    public $dateTimeFormat = 'd.m.Y H:i';
//    public $formatSwitchCount = 10;
//    public $appId;
    public $expert_id;

    private $labels = [];
    private $setLabels = [];
    private $typesCount = [];
    private $data = [];

    /** @var array $models */
    private $models;

    /**
     * possible parameter types
     */
    const PARAM_TYPES = [
        Meets::TYPE_CONSULTATION,
        Meets::TYPE_COURSE,
        'common'
    ];

    /**
     * @return ReportBuilder
     */
    public function makeReport()
    {
        $this->findData();
        if (empty($this->models)) {
            return null;
        }
        $this->processData();
        $this->fillReport();
        return $this;
    }

    /** @return array */
    public function getLabels()
    {
        return $this->labels;
    }

    /**
     * @return array
     */
    public function getTypesCount()
    {
        return $this->typesCount;
    }

    /**
     * @return array
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @return int
     */
    private function processData()
    {
        $count = 0;
        /** @var $row Meets */
        foreach ($this->models as $row) {
            $this->processRow($row);
            $label = date($this->dateFormat, strtotime($row->time_from));

            if (!isset($this->setLabels[$label])) {
                $this->labels[] = $label;
            }

            if (!isset($this->setLabels[$label][$row->meet_type])) {
                $this->setLabels[$label][$row->meet_type] = 1;
            } else {
                $this->setLabels[$label][$row->meet_type]++;
            }

            if (!isset($this->setLabels[$label]['common'])) {
                $this->setLabels[$label]['common'] = 1;
            } else {
                $this->setLabels[$label]['common']++;
            }

            $count++;
        }

        return $count;
    }


    private function fillReport()
    {
        foreach ($this->setLabels as $label) {
            foreach (self::PARAM_TYPES as $param) {
                $this->data[$param][] = isset($label[$param]) ? $label[$param] : 0;
            }
        }
    }


    /**
     * @param Meets $row
     */
    private function processRow($row)
    {
        if (!isset($this->typesCount[$row->meet_type])) {
            $this->typesCount[$row->meet_type] = 1;
        } else {
            $this->typesCount[$row->meet_type]++;
        }


        if (!isset($this->typesCount['common'])) {
            $this->typesCount['common'] = 1;
        } else {
            $this->typesCount['common']++;
        }
    }


    private function findData()
    {
        $this->models = Meets::find()
            ->where(['expert_id'=>$this->expert_id])
            ->orderBy(['plan_from' => SORT_ASC])
            ->all();
    }


}
