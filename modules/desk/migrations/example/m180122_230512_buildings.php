<?php

use yii\db\Migration;

class m180122_230513_buildings extends Migration
{
    public function safeUp()
    {

        $this->insert('{{%med_buildings}}', ['id' => '1', 'name' => 'Головний корпус', 'adress' => 'Київ вул.Богатирська 30', 'lattitude' => '', 'longitude' => '', 'floors' => '2']);
        $this->insert('{{%med_buildings}}', ['id' => '2', 'name' => 'Пансіонат', 'adress' => 'Київ вул.Богатирська 30а', 'lattitude' => '', 'longitude' => '', 'floors' => '1']);
    }

    public function safeDown()
    {

    }
}
