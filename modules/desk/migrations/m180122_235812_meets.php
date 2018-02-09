<?php

use yii\db\Schema;
use yii\db\Migration;

class m180122_235812_meets extends Migration
{
    public function safeUp()
    {
        $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        $this->createTable('{{%med_meets}}',
            [
                'id' => Schema::TYPE_PK . '',
                'expert_id' => Schema::TYPE_INTEGER . '(11) NOT NULL',
                'expert_group_id' => Schema::TYPE_INTEGER . '(11) NOT NULL',
                'patient_id' => Schema::TYPE_INTEGER . '(11) NOT NULL',
                'place_id' => Schema::TYPE_INTEGER . '(11)',
                'course_id' => Schema::TYPE_INTEGER . '(11)',
                'status' => "enum('planned','done','rejected')" . ' NOT NULL',
                'meet_type' => "enum('initial','consultation','consilium','course','urgent')" . ' NOT NULL',
                'for_excerpt' => Schema::TYPE_BOOLEAN . '(1) NOT NULL',
                'text' => Schema::TYPE_STRING . '(1024)',
                'comment' => Schema::TYPE_STRING . '(512)',
                'plan_from' => Schema::TYPE_DATETIME . '',
                'plan_to' => Schema::TYPE_DATETIME . '',
                'time_from' => Schema::TYPE_DATETIME . '',
                'time_to' => Schema::TYPE_DATETIME . '',
            ], $tableOptions);

    }

    public function safeDown()
    {
        $this->dropTable('{{%med_meets}}');
    }
}
