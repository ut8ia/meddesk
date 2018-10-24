<?php

use yii\db\Schema;
use yii\db\Migration;

class m181021_132912_form_values extends Migration
{
    public function safeUp()
    {
        $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        $this->createTable('{{%med_form_values}}',
            [
                'form_id' => Schema::TYPE_INTEGER . '(11) NOT NULL',
                'param_id' => Schema::TYPE_INTEGER . '(11) NOT NULL',
                'meet_id' => Schema::TYPE_INTEGER . '(11) NOT NULL',
                'value' => Schema::TYPE_STRING . '(255)',
            ], $tableOptions);

    }

    public function safeDown()
    {

        $this->dropTable('{{%med_form_values}}');
    }
}
