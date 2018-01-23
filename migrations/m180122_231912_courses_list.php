<?php

use yii\db\Schema;
use yii\db\Migration;

class m180122_231912_courses_list extends Migration
{
    public function safeUp()
    {
        $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        $this->createTable('{{%med_courses_list}}',
            [
                'id' => Schema::TYPE_PK . '',
                'course_id' => Schema::TYPE_INTEGER . '(11) NOT NULL',
                'patient_id' => Schema::TYPE_INTEGER . '(11) NOT NULL',
                'status' => "enum('in_list','reserve','rejected')" . ' NOT NULL',
                'date_from' => Schema::TYPE_DATE . ' NOT NULL',
                'date_to' => Schema::TYPE_DATE . ' NOT NULL',
                'comment' => Schema::TYPE_STRING . '(512) NOT NULL',
            ], $tableOptions);

    }

    public function safeDown()
    {
        $this->dropTable('{{%med_courses_list}}');
    }
}
