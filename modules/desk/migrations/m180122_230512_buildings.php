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

    }

    public function safeDown()
    {
        $this->dropTable('{{%med_buildings}}');
    }
}
