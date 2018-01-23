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

        $this->createIndex('expert_id', '{{%med_expert_places_link}}', 'expert_id', 0);
        $this->createIndex('placesExpertLink', '{{%med_expert_places_link}}', 'place_id', 0);
        $this->addForeignKey('fk_med_expert_places_link_expert_id', '{{%med_expert_places_link}}', 'expert_id', 'med_experts', 'id');
        $this->addForeignKey('fk_med_expert_places_link_place_id', '{{%med_expert_places_link}}', 'place_id', 'med_places', 'id');

    }

    public function safeDown()
    {
        $this->dropForeignKey('fk_med_expert_places_link_expert_id', '{{%med_expert_places_link}}');
        $this->dropForeignKey('fk_med_expert_places_link_place_id', '{{%med_expert_places_link}}');
        $this->dropTable('{{%med_expert_places_link}}');
    }
}
