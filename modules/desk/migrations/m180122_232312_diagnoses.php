<?php

use yii\db\Schema;
use yii\db\Migration;

class m180122_232312_diagnoses extends Migration
{
    public function safeUp()
    {
        $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        $this->createTable('{{%med_diagnoses}}',
            [
                'id' => Schema::TYPE_PK . '',
                'code' => Schema::TYPE_STRING . '(32) NOT NULL',
                'name' => Schema::TYPE_STRING . '(128)',
                'text' => Schema::TYPE_STRING . '(512)',
            ], $tableOptions);

    }

    public function safeDown()
    {
        $this->dropTable('{{%med_diagnoses}}');
    }
}
