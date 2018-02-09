<?php

use yii\db\Schema;
use yii\db\Migration;

class m180123_000512_places extends Migration
{
    public function safeUp()
    {
        $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        $this->createTable('{{%med_places}}',
            [
                'id' => Schema::TYPE_PK . '',
                'name' => Schema::TYPE_STRING . '(255) NOT NULL',
                'number' => Schema::TYPE_SMALLINT . '(6)',
                'description' => Schema::TYPE_STRING . '(512)',
                'building_id' => Schema::TYPE_INTEGER . '(11) NOT NULL',
                'floor' => Schema::TYPE_SMALLINT . '(4) NOT NULL',
            ], $tableOptions);

    }

    public function safeDown()
    {

        $this->dropTable('{{%med_places}}');
    }
}
