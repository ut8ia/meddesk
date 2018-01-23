<?php

use yii\db\Schema;
use yii\db\Migration;

class m180123_001112_schedule_exception_days extends Migration
{
    public function safeUp()
    {
        $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        $this->createTable('{{%med_schedule_exception_days}}',
            [
                'id' => Schema::TYPE_PK . '',
                'date' => Schema::TYPE_DATE . ' NOT NULL',
                'comment' => Schema::TYPE_STRING . '(255) NOT NULL',
            ], $tableOptions);

    }

    public function safeDown()
    {
        $this->dropTable('{{%med_schedule_exception_days}}');
    }
}
