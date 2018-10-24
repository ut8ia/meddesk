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
                'form_id' => Schema::TYPE_SMALLINT . '(5) unsigned NOT NULL',
                'param_id' => Schema::TYPE_INTEGER . '(11) NOT NULL',
                'meet_id' => Schema::TYPE_INTEGER . '(11) NOT NULL',
                'value' => Schema::TYPE_STRING . '(255)',
            ], $tableOptions);

        $this->createIndex('meet_id', '{{%med_form_values}}', 'meet_id', 0);
        $this->createIndex('param_id', '{{%med_form_values}}', 'param_id', 0);
        $this->addForeignKey('fk_med_form_values_form_id', '{{%med_form_values}}', 'form_id', 'med_forms', 'id');
        $this->addForeignKey('fk_med_form_values_meet_id', '{{%med_form_values}}', 'meet_id', 'med_meets', 'id');
        $this->addForeignKey('fk_med_form_values_param_id', '{{%med_form_values}}', 'param_id', 'med_form_params', 'id');
    }

    public function safeDown()
    {
        $this->dropForeignKey('fk_med_form_values_form_id', '{{%med_form_values}}');
        $this->dropForeignKey('fk_med_form_values_meet_id', '{{%med_form_values}}');
        $this->dropForeignKey('fk_med_form_values_param_id', '{{%med_form_values}}');
        $this->dropTable('{{%med_form_values}}');
    }
}
