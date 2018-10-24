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
                'form_id' => Schema::TYPE_INTEGER . '(11) NOT NULL',
                'param_id' => Schema::TYPE_INTEGER . '(11) NOT NULL',
                'order_num' => Schema::TYPE_SMALLINT . '(6) NULL',
            ], $tableOptions);

 }

    public function safeDown()
    {

        $this->dropTable('{{%med_form_params_link}}');
    }
}
