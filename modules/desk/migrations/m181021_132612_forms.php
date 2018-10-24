<?php

use yii\db\Schema;
use yii\db\Migration;

class m181021_132612_forms extends Migration
{
    public function safeUp()
    {
        $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        $this->createTable('{{%med_forms}}',
            [
                'id' => 'INT(5) NOT NULL AUTO_INCREMENT PRIMARY KEY UNSIGNED',
                'name' => Schema::TYPE_STRING . '(32) NOT NULL',
            ], $tableOptions);

    }

    public function safeDown()
    {
        $this->dropTable('{{%med_forms}}');
    }
}
