<?php

use yii\db\Schema;
use yii\db\Migration;

class m180122_230512_buildings extends Migration
{
    public function safeUp()
    {
        $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        $this->createTable('{{%med_buildings}}',
            [
                'id' => Schema::TYPE_PK . '',
                'name' => Schema::TYPE_STRING . '(64) NOT NULL',
                'adress' => Schema::TYPE_STRING . '(255) NOT NULL',
                'lattitude' => Schema::TYPE_FLOAT . '',
                'longitude' => Schema::TYPE_FLOAT . '',
                'floors' => Schema::TYPE_INTEGER . '(11) NOT NULL',
            ], $tableOptions);

        $this->insert('{{%med_buildings}}', ['id' => '1', 'name' => 'Головний корпус', 'adress' => 'Київ вул.Богатирська 30', 'lattitude' => '', 'longitude' => '', 'floors' => '2']);
        $this->insert('{{%med_buildings}}', ['id' => '2', 'name' => 'Пансіонат', 'adress' => 'Київ вул.Богатирська 30а', 'lattitude' => '', 'longitude' => '', 'floors' => '1']);
    }

    public function safeDown()
    {
        $this->dropTable('{{%med_buildings}}');
    }
}
