<?php

use yii\db\Schema;
use yii\db\Migration;

class m180122_234712_expert_patients_link extends Migration
{
    public function safeUp()
    {
        $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        $this->createTable('{{%med_expert_patients_link}}',
            [
                'id' => Schema::TYPE_PK . '',
                'expert_id' => Schema::TYPE_INTEGER . '(11) NOT NULL',
                'expert_group_id' => Schema::TYPE_INTEGER . '(11) NOT NULL',
                'patient_id' => Schema::TYPE_INTEGER . '(11) NOT NULL',
            ], $tableOptions);

  }

    public function safeDown()
    {

        $this->dropTable('{{%med_expert_patients_link}}');
    }
}
