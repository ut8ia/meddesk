<?php

use yii\db\Schema;
use yii\db\Migration;

class m181021_132812_form_params_link extends Migration
{
    public function safeUp()
    {
        $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        $this->createTable('{{%med_form_params_link}}',
            [
                'form_id' => Schema::TYPE_SMALLINT . '(5) unsigned NOT NULL',
                'param_id' => Schema::TYPE_INTEGER . '(11) NOT NULL',
                'order_num' => Schema::TYPE_SMALLINT . '(6) NULL',
            ], $tableOptions);

        $this->createIndex('forms_params_param', '{{%med_form_params_link}}', 'param_id', 0);
        $this->addForeignKey('fk_med_form_params_link_form_id', '{{%med_form_params_link}}', 'form_id', 'med_forms', 'id');
        $this->addForeignKey('fk_med_form_params_link_param_id', '{{%med_form_params_link}}', 'param_id', 'med_form_params', 'id');
    }

    public function safeDown()
    {
        $this->dropForeignKey('fk_med_form_params_link_form_id', '{{%med_form_params_link}}');
        $this->dropForeignKey('fk_med_form_params_link_param_id', '{{%med_form_params_link}}');
        $this->dropTable('{{%med_form_params_link}}');
    }
}
