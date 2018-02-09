<?php

use yii\db\Schema;
use yii\db\Migration;

class m180122_232912_diagnoses_appointments extends Migration
{
    public function safeUp()
    {
        $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        $this->createTable('{{%med_diagnoses_appointments}}',
            [
                'id' => Schema::TYPE_PK . '',
                'patient_id' => Schema::TYPE_INTEGER . '(11) NOT NULL',
                'expert_id' => Schema::TYPE_INTEGER . '(11)',
                'expert_group_id' => Schema::TYPE_INTEGER . '(11)',
                'diagnoses_id' => Schema::TYPE_INTEGER . '(11) NOT NULL',
                'appointment_type' => "enum('main','additional')" . ' NOT NULL',
                'date' => Schema::TYPE_DATE . '',
                'text' => Schema::TYPE_STRING . '(512)',
            ], $tableOptions);

    }

    public function safeDown()
    {
        $this->dropTable('{{%med_diagnoses_appointments}}');
    }
}
