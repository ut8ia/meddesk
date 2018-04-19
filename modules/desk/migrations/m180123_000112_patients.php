<?php

use yii\db\Schema;
use yii\db\Migration;

class m180123_000112_patients extends Migration
{
    public function safeUp()
    {
        $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        $this->createTable('{{%med_patients}}',
            [
                'id' => Schema::TYPE_PK . '',
                'name' => Schema::TYPE_STRING . '(255) NOT NULL',
                'surname' => Schema::TYPE_STRING . '(255) NOT NULL',
                'patronymic' => Schema::TYPE_STRING . '(255) NOT NULL',
                'card_number' => Schema::TYPE_STRING . '(8) NOT NULL',
                'sex' => "enum('female','male')" . ' NOT NULL',
                'birthdate' => Schema::TYPE_DATE . ' NOT NULL',
                'region_id' => Schema::TYPE_SMALLINT . '(4) NOT NULL',
                'city' => Schema::TYPE_STRING . '(64) NULL',
                'city_id' => Schema::TYPE_INTEGER . '(11) NOT NULL DEFAULT 0',
                'district' => Schema::TYPE_STRING . '(40) NULL',
                'district_a' => Schema::TYPE_STRING . '(2) NOT NULL',
                'user_id' => Schema::TYPE_INTEGER . '(11) NOT NULL',
                'address' => Schema::TYPE_STRING . '(128) NULL',
                'phone' => Schema::TYPE_STRING . '(16) NULL',
                'email' => Schema::TYPE_STRING . '(64) NULL',

            ], $tableOptions);

    }

    public function safeDown()
    {
        $this->dropTable('{{%med_patients}}');
    }
}
