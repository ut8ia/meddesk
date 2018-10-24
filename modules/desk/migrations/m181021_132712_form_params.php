<?php

use yii\db\Schema;
use yii\db\Migration;

class m181021_132712_form_params extends Migration
{
    public function safeUp()
    {
        $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        $this->createTable('{{%med_form_params}}',
            [
                'id' => Schema::TYPE_PK . '',
                'name' => Schema::TYPE_STRING . '(32) NOT NULL',
                'label' => Schema::TYPE_STRING . '(128) NOT NULL',
                'type' => "enum('bool','string','integer','array')" . ' NOT NULL',
                'default' => Schema::TYPE_STRING . '(255) NULL',
                'options' => Schema::TYPE_STRING . '(512)',
                'min' => Schema::TYPE_INTEGER . '(11)',
                'max' => Schema::TYPE_INTEGER . '(11)',
            ], $tableOptions);

    }

    public function safeDown()
    {
        $this->dropTable('{{%med_form_params}}');
    }
}
