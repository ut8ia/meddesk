<?php

use yii\db\Schema;
use yii\db\Migration;

class m180123_000712_places_expert_groups_link extends Migration
{
    public function safeUp()
    {
        $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        $this->createTable('{{%med_places_expert_groups_link}}',
            [
                'id' => Schema::TYPE_PK . '',
                'place_id' => Schema::TYPE_INTEGER . '(11) NOT NULL',
                'expert_group_id' => Schema::TYPE_INTEGER . '(11) NOT NULL',
            ], $tableOptions);

    }

    public function safeDown()
    {
        $this->dropTable('{{%med_places_expert_groups_link}}');
    }
}
