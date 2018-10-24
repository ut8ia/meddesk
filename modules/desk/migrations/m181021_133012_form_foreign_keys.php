<?php

use yii\db\Schema;
use yii\db\Migration;

class m181021_133012_form_foreign_keys extends Migration
{
    public function safeUp()
    {

        $this->createIndex('forms_params_param', '{{%med_form_params_link}}', 'param_id', 0);
        $this->addForeignKey('fk_med_form_params_link_form_id', '{{%med_form_params_link}}', 'form_id', 'med_forms', 'id');
        $this->addForeignKey('fk_med_form_params_link_param_id', '{{%med_form_params_link}}', 'param_id', 'med_form_params', 'id');


        $this->createIndex('meet_id', '{{%med_form_values}}', 'meet_id', 0);
        $this->createIndex('param_id', '{{%med_form_values}}', 'param_id', 0);
        $this->addForeignKey('fk_med_form_values_form_id', '{{%med_form_values}}', 'form_id', 'med_forms', 'id');
        $this->addForeignKey('fk_med_form_values_meet_id', '{{%med_form_values}}', 'meet_id', 'med_meets', 'id');
        $this->addForeignKey('fk_med_form_values_param_id', '{{%med_form_values}}', 'param_id', 'med_form_params', 'id');
    }

    public function safeDown()
    {

        $this->dropForeignKey('fk_med_form_params_link_form_id', '{{%med_form_params_link}}');
        $this->dropForeignKey('fk_med_form_params_link_param_id', '{{%med_form_params_link}}');

        $this->dropForeignKey('fk_med_form_values_form_id', '{{%med_form_values}}');
        $this->dropForeignKey('fk_med_form_values_meet_id', '{{%med_form_values}}');
        $this->dropForeignKey('fk_med_form_values_param_id', '{{%med_form_values}}');

    }
}
