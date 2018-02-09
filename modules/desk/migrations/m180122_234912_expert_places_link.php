<?php

use yii\db\Schema;
use yii\db\Migration;

class m180122_234912_expert_places_link extends Migration
{
    public function safeUp()
    {
        $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        $this->createTable('{{%med_expert_places_link}}',
            [
                'id' => Schema::TYPE_PK . '',
                'expert_id' => Schema::TYPE_INTEGER . '(11) NOT NULL',
                'place_id' => Schema::TYPE_INTEGER . '(11) NOT NULL',
            ], $tableOptions);
  }

    public function safeDown()
    {
        $this->dropTable('{{%med_expert_places_link}}');
    }
}
