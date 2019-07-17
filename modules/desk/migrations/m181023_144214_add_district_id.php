<?php

use app\modules\desk\models\Patients;
use yii\db\Migration;

class m181023_144214_add_district_id extends Migration
{
    public function safeUp()
    {
        $this->addColumn(Patients::tableName(), 'district_id', $this->integer()->null()->after('region_id'));
    }


    public function safeDown()
    {

    }
}
