<?php

use yii\db\Schema;
use yii\db\Migration;

class m180122_230912_courses extends Migration
{
    public function safeUp()
    {
        $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        $this->createTable('{{%med_courses}}',
            [
                'id' => Schema::TYPE_PK . '',
                'number' => Schema::TYPE_INTEGER . '(11) NOT NULL',
                'date_start' => Schema::TYPE_DATETIME . ' NOT NULL',
                'date_end' => Schema::TYPE_DATETIME . ' NOT NULL',
                'status' => "enum('open','closed','planned')" . ' NOT NULL DEFAULT "planned"',
            ], $tableOptions);

        $this->createIndex('number', '{{%med_courses}}', 'number', 1);
    }

    public function safeDown()
    {
        $this->dropTable('{{%med_courses}}');
    }
}
