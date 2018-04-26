<?php

use yii\db\Schema;
use yii\db\Migration;

class m180122_234212_expert_groups extends Migration
{
    public function safeUp()
    {
        $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        $this->createTable('{{%med_expert_groups}}',
            [
                'id' => Schema::TYPE_PK . '',
                'name' => Schema::TYPE_STRING . '(255) NOT NULL',
                'type' => "enum('common','rehabilitation','consultation','diagnostic')" . ' NOT NULL DEFAULT "common"',
                'description' => Schema::TYPE_STRING . '(255)',
                'patient_required' => Schema::TYPE_BOOLEAN . '(1) NOT NULL DEFAULT "0"',
                'course_required' => Schema::TYPE_BOOLEAN . '(1) NOT NULL DEFAULT "0"',
                'excerpt_required' => Schema::TYPE_BOOLEAN . '(1) NOT NULL DEFAULT "0"',
                'excerpt_order' => Schema::TYPE_SMALLINT . '(4)',
                'display_color' => Schema::TYPE_STRING . '(16) NOT NULL DEFAULT "#777777"',
                'deleted' => Schema::TYPE_BOOLEAN . '(1)',
            ], $tableOptions);
    }

    public function safeDown()
    {
        $this->dropTable('{{%med_expert_groups}}');
    }
}
