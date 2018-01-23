<?php

use yii\db\Schema;
use yii\db\Migration;

class m180122_233512_excerpts extends Migration
{
    public function safeUp()
    {
        $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        $this->createTable('{{%med_excerpts}}',
            [
                'id' => Schema::TYPE_PK . '',
                'course_id' => Schema::TYPE_INTEGER . '(11) NOT NULL',
                'patient_id' => Schema::TYPE_INTEGER . '(11) NOT NULL',
                'text' => Schema::TYPE_STRING . '(1024) NOT NULL',
                'date' => Schema::TYPE_INTEGER . '(11) NOT NULL',
            ], $tableOptions);

    }

    public function safeDown()
    {
        $this->dropTable('{{%med_excerpts}}');
    }
}
