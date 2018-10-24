<?php

use yii\db\Schema;
use yii\db\Migration;

class m180123_001712_schedule_teplates extends Migration
{
    public function safeUp()
    {
        $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        $this->createTable('{{%med_schedule_teplates}}',
            [
                'id' => Schema::TYPE_PK . '',
                'expert_id' => Schema::TYPE_INTEGER . '(11) NOT NULL',
                'expert_group_id' => Schema::TYPE_INTEGER . '(11) NOT NULL',
                'place_id' => Schema::TYPE_INTEGER . '(11) NOT NULL',
                'week_day' => Schema::TYPE_SMALLINT . '(4) NOT NULL',
                'time_from' => Schema::TYPE_DATETIME . ' NOT NULL',
                'time_to' => Schema::TYPE_DATETIME . ' NOT NULL',
                'comment' => Schema::TYPE_STRING . '(255) NOT NULL',
            ], $tableOptions);

    }

    public function safeDown()
    {
        $this->dropTable('{{%med_schedule_teplates}}');
    }
}
