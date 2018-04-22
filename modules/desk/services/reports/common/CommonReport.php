<?php

namespace app\modules\desk\services\reports\common;

use app\modules\desk\models\Patients;
use app\modules\desk\services\reports\BaseReport;


class CommonReport extends BaseReport
{


    public $dateFormat = 'Y';
//    public $dateTimeFormat = 'd.m.Y H:i';
//    public $formatSwitchCount = 10;
//    public $appId;

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
        Patients::SEX_FEMALE,
        Patients::SEX_MALE,
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
        /** @var $row Patients */
        foreach ($this->models as $row) {
            $this->processRow($row);
            $label = date($this->dateFormat, strtotime($row->birthdate));

            if (!isset($this->setLabels[$label])) {
                $this->labels[] = $label;
            }

            if (!isset($this->setLabels[$label][$row->sex])) {
                $this->setLabels[$label][$row->sex] = 1;
            } else {
                $this->setLabels[$label][$row->sex]++;
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
     * @param Patients $row
     */
    private function processRow($row)
    {
        if (!isset($this->typesCount[$row->sex])) {
            $this->typesCount[$row->sex] = 1;
        } else {
            $this->typesCount[$row->sex]++;
        }


        if (!isset($this->typesCount['common'])) {
            $this->typesCount['common'] = 1;
        } else {
            $this->typesCount['common']++;
        }
    }


    private function findData()
    {
        $this->models = Patients::find()
            ->orderBy(['birthdate' => SORT_ASC])
            ->all();
    }


}