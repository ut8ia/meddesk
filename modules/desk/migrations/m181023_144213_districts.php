<?php

use yii\db\Schema;
use yii\db\Migration;

class m181023_144213_districts extends Migration
{
    public function safeUp()
    {
        $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        $this->createTable('{{%med_districts}}',
            [
                'id' => Schema::TYPE_PK . '',
                'name' => Schema::TYPE_STRING . '(32) NOT NULL',
                'region_id' => Schema::TYPE_INTEGER . ' NOT NULL',
            ], $tableOptions);

        $this->insert('{{%med_districts}}', ['id' => 15, 'name' => 'Голосіївський', 'region_id' => 26]);
        $this->insert('{{%med_districts}}', ['id' => 16, 'name' => 'Дарницький', 'region_id' => 26]);
        $this->insert('{{%med_districts}}', ['id' => 17, 'name' => 'Деснянський', 'region_id' => 26]);
        $this->insert('{{%med_districts}}', ['id' => 18, 'name' => 'Дніпровьский', 'region_id' => 26]);
        $this->insert('{{%med_districts}}', ['id' => 19, 'name' => 'Оболонський', 'region_id' => 26]);
        $this->insert('{{%med_districts}}', ['id' => 20, 'name' => 'Печерський', 'region_id' => 26]);
        $this->insert('{{%med_districts}}', ['id' => 21, 'name' => 'Подільський', 'region_id' => 26]);
        $this->insert('{{%med_districts}}', ['id' => 22, 'name' => 'Святошинський', 'region_id' => 26]);
        $this->insert('{{%med_districts}}', ['id' => 23, 'name' => 'Соломʼяньский', 'region_id' => 26]);
        $this->insert('{{%med_districts}}', ['id' => 24, 'name' => 'Шевченківський', 'region_id' => 26]);
    }

    public function safeDown()
    {
        $this->dropTable('{{%med_districts}}');
    }
}
