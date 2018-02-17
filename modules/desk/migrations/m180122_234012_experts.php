<?php

use yii\db\Schema;
use yii\db\Migration;

class m180122_234012_experts extends Migration
{
    public function safeUp()
    {
        $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        $this->createTable('{{%med_experts}}',
            [
                'id' => Schema::TYPE_PK . '',
                'auth_key' => Schema::TYPE_STRING . '(32)',
                'password_hash' => Schema::TYPE_STRING . '(255) NOT NULL',
                'password_reset_token' => Schema::TYPE_STRING . '(255)',
                'password_change' => Schema::TYPE_BOOLEAN . '(1)',
                'email' => Schema::TYPE_STRING . '(128)',
                'status' => "enum('new','active','blocked')" . ' NOT NULL',
                'created_at' => Schema::TYPE_INTEGER . '(11) NOT NULL',
                'updated_at' => Schema::TYPE_INTEGER . '(11) NOT NULL',
                'surname' => Schema::TYPE_STRING . '(127) NOT NULL',
                'name' => Schema::TYPE_STRING . '(127) NOT NULL',
                'patronymic' => Schema::TYPE_STRING . '(127) NOT NULL',
                'short_info' => Schema::TYPE_STRING . '(256) NOT NULL',
                'info' => Schema::TYPE_STRING . '(2056) NOT NULL',
                'specialization' => Schema::TYPE_STRING . '(127) NOT NULL',
                'slug' => Schema::TYPE_STRING . '(255)',
                'deleted' => Schema::TYPE_BOOLEAN . '(1)',
                'file_version' => Schema::TYPE_INTEGER . '(11)',
                'file_extension' => Schema::TYPE_STRING . '(6)',
            ], $tableOptions);

    }

    public function safeDown()
    {
        $this->dropTable('{{%med_experts}}');
    }
}
