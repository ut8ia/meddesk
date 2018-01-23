<?php

use yii\db\Schema;
use yii\db\Migration;

class m180123_000912_schedule extends Migration
{
    public function safeUp()
    {
        $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        $this->createTable('{{%med_schedule}}',
            [
                'id' => Schema::TYPE_PK . '',
                'expert_id' => Schema::TYPE_INTEGER . '(11) NOT NULL',
                'expert_group_id' => Schema::TYPE_INTEGER . '(11) NOT NULL',
                'place_id' => Schema::TYPE_INTEGER . '(11) NOT NULL',
                'meet_type_id' => Schema::TYPE_INTEGER . '(11) NOT NULL',
                'time_from' => Schema::TYPE_DATETIME . ' NOT NULL',
                'time_to' => Schema::TYPE_DATETIME . ' NOT NULL',
                'comment' => Schema::TYPE_STRING . '(512) NOT NULL',
            ], $tableOptions);

        $this->createIndex('expertSchedule', '{{%med_schedule}}', 'expert_id', 0);
        $this->addForeignKey('fk_med_schedule_expert_id', '{{%med_schedule}}', 'expert_id', 'med_experts', 'id');
    }

    public function safeDown()
    {
        $this->dropForeignKey('fk_med_schedule_expert_id', '{{%med_schedule}}');
        $this->dropTable('{{%med_schedule}}');
    }
}
