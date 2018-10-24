<?php

use yii\db\Schema;
use yii\db\Migration;

class m181023_144212_regions extends Migration
{
    public function safeUp()
    {
        $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        $this->createTable('{{%med_regions}}',
            [
                'id' => Schema::TYPE_PK . '',
                'name' => Schema::TYPE_STRING . '(32) NOT NULL',
                'card_chars' => Schema::TYPE_STRING . '(12) NOT NULL',
            ], $tableOptions);

        $this->insert('{{%med_regions}}', ['id' => '1', 'name' => 'А. Р. Крим', 'card_chars' => '01171']);
        $this->insert('{{%med_regions}}', ['id' => '2', 'name' => 'Вінницька', 'card_chars' => '01482']);
        $this->insert('{{%med_regions}}', ['id' => '3', 'name' => 'Волинська', 'card_chars' => '01183']);
        $this->insert('{{%med_regions}}', ['id' => '4', 'name' => 'Дніпрпетровська', 'card_chars' => '01316']);
        $this->insert('{{%med_regions}}', ['id' => '5', 'name' => 'Донецька', 'card_chars' => '01273']);
        $this->insert('{{%med_regions}}', ['id' => '6', 'name' => 'Житомирська', 'card_chars' => '01667']);
        $this->insert('{{%med_regions}}', ['id' => '7', 'name' => 'Закарпатська', 'card_chars' => '01143']);
        $this->insert('{{%med_regions}}', ['id' => '8', 'name' => 'Запорізька', 'card_chars' => '01224']);
        $this->insert('{{%med_regions}}', ['id' => '9', 'name' => 'Івано-Франківська', 'card_chars' => '01201']);
        $this->insert('{{%med_regions}}', ['id' => '10', 'name' => 'Киїівська', 'card_chars' => '04639']);
        $this->insert('{{%med_regions}}', ['id' => '11', 'name' => 'Кіровоградська', 'card_chars' => '01165']);
        $this->insert('{{%med_regions}}', ['id' => '12', 'name' => 'Луганська', 'card_chars' => '01188']);
        $this->insert('{{%med_regions}}', ['id' => '13', 'name' => 'Львівська', 'card_chars' => '01157']);
        $this->insert('{{%med_regions}}', ['id' => '14', 'name' => 'Миколаївська', 'card_chars' => '01214']);
        $this->insert('{{%med_regions}}', ['id' => '15', 'name' => 'Одеська', 'card_chars' => '01162']);
        $this->insert('{{%med_regions}}', ['id' => '16', 'name' => 'Полтавська', 'card_chars' => '01342']);
        $this->insert('{{%med_regions}}', ['id' => '17', 'name' => 'Рівненська', 'card_chars' => '01310']);
        $this->insert('{{%med_regions}}', ['id' => '18', 'name' => 'Сумська', 'card_chars' => '01189']);
        $this->insert('{{%med_regions}}', ['id' => '19', 'name' => 'Тернопільська', 'card_chars' => '01193']);
        $this->insert('{{%med_regions}}', ['id' => '20', 'name' => 'Харківська', 'card_chars' => '01169']);
        $this->insert('{{%med_regions}}', ['id' => '21', 'name' => 'Херсонська', 'card_chars' => '01130']);
        $this->insert('{{%med_regions}}', ['id' => '22', 'name' => 'Хмельницька', 'card_chars' => '01314']);
        $this->insert('{{%med_regions}}', ['id' => '23', 'name' => 'Черкаська', 'card_chars' => '01597']);
        $this->insert('{{%med_regions}}', ['id' => '24', 'name' => 'Чернівецька', 'card_chars' => '01118']);
        $this->insert('{{%med_regions}}', ['id' => '25', 'name' => 'Чернігівська', 'card_chars' => '01452']);
        $this->insert('{{%med_regions}}', ['id' => '26', 'name' => 'м.Київ', 'card_chars' => '01001']);
        $this->insert('{{%med_regions}}', ['id' => '27', 'name' => 'м.Севастополь', 'card_chars' => '01037']);
        $this->insert('{{%med_regions}}', ['id' => '38', 'name' => 'СНГ', 'card_chars' => '01021']);
        $this->insert('{{%med_regions}}', ['id' => '39', 'name' => 'Інші країни', 'card_chars' => '01066']);
    }

    public function safeDown()
    {
        $this->dropTable('{{%med_regions}}');
    }
}
