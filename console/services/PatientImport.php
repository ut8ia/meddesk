<?php

namespace app\console\services;


use app\modules\desk\models\Patients;
use DateTime;


class  PatientImport
{

    public $path = 'console/storage/';
    public $filename = 'patients.csv';
    public $delimeter = ',';
    public $inputDateFormat = 'd/m/Y';
    public $dbDateFormat = '';
    public $validRowLenght = 15;


    private $count = 0;
    private $errors = 0;

    public function import()
    {
        $this->readFile();

        echo 'count: ' . $this->count . PHP_EOL;
        echo 'errors: ' . $this->errors . PHP_EOL;
    }


    private function readFile()
    {
        if (($handle = fopen($this->path . $this->filename, "r")) !== false) {

            while (($row = fgetcsv($handle, 1000, $this->delimeter)) !== false) {
                $this->parseRow($row);
            }
            fclose($handle);
        }
    }


    /**
     * @param array $row
     */
    private function parseRow($row)
    {
        if (count($row) !== $this->validRowLenght) {
            return null;
        }

        $patient = new Patients();
        $patient->user_id = $row[0];
        $patient->card_number = $row[1];
        $patient->surname = $row[2];
        $patient->name = $row[3];
        $patient->patronymic = $row[4];
        $patient->birthdate = $this->convertDate($row[5]);
        $patient->sex = $this->resloveSex($row[6]);
        $patient->region_id = $row[8];
        $patient->district = $row[9];
        $patient->district_a = $row[10];
        $patient->city = $row[11];
        $patient->address = $row[12];
        $patient->phone = $row[13];

        if (!$result = $patient->save()) {
            echo $patient->card_number . PHP_EOL;
            d($patient->errors);
            $this->errors++;

        } else {
            $this->count++;
        }

    }

    /**
     * @param integer $sexId
     * @return string
     */
    private function resloveSex($sexId)
    {
        return $sexId == 1 ? Patients::SEX_MALE : Patients::SEX_FEMALE;
    }


    private function convertDate($date)
    {
        if ($date = DateTime::createFromFormat($this->inputDateFormat, $date)) {
            return $date->format(DATE_ATOM);
        }
    }


}


?>

