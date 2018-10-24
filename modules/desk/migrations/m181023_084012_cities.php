<?php

use yii\db\Schema;
use yii\db\Migration;

class m181023_084012_cities extends Migration
{
    public function safeUp()
    {
        $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        $this->createTable('{{%med_cities}}',
            [
                'id' => Schema::TYPE_PK . '',
                'name' => Schema::TYPE_STRING . '(64) NOT NULL',
                'type' => "enum('city','town','village','unknown')" . ' NOT NULL',
                'region_id' => Schema::TYPE_INTEGER . '(11) NOT NULL',
            ], $tableOptions);

        $this->createIndex('name', '{{%med_cities}}', 'name,region_id,type', 1);
    }

    public function safeDown()
    {
        $this->dropTable('{{%med_cities}}');
    }
}
