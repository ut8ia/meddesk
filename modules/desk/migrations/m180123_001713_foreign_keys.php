<?php

use yii\db\Migration;

class m180123_001713_foreign_keys extends Migration
{
    public function safeUp()
    {
        $this->createIndex('diagnosesAppointmentsExperts', '{{%med_diagnoses_appointments}}', 'expert_id', 0);
        $this->addForeignKey('fk_med_diagnoses_appointments_expert_id', '{{%med_diagnoses_appointments}}', 'expert_id', 'med_experts', 'id');

        $this->createIndex('expertGroupLink', '{{%med_expert_groups_link}}', 'expert_id', 0);
        $this->addForeignKey('fk_med_expert_groups_link_expert_id', '{{%med_expert_groups_link}}', 'expert_id', 'med_experts', 'id');

        $this->createIndex('patientExpert', '{{%med_expert_patients_link}}', 'expert_id', 0);
        $this->addForeignKey('fk_med_expert_patients_link_expert_id', '{{%med_expert_patients_link}}', 'expert_id', 'med_experts', 'id');

        $this->createIndex('expert_id', '{{%med_expert_places_link}}', 'expert_id', 0);
        $this->createIndex('placesExpertLink', '{{%med_expert_places_link}}', 'place_id', 0);
        $this->addForeignKey('fk_med_expert_places_link_expert_id', '{{%med_expert_places_link}}', 'expert_id', 'med_experts', 'id');
        $this->addForeignKey('fk_med_expert_places_link_place_id', '{{%med_expert_places_link}}', 'place_id', 'med_places', 'id');

        $this->createIndex('meetsExpert', '{{%med_meets}}', 'expert_id', 0);
        $this->addForeignKey('fk_med_meets_expert_id', '{{%med_meets}}', 'expert_id', 'med_experts', 'id');

        $this->createIndex('placeBuildings', '{{%med_places}}', 'building_id', 0);
        $this->addForeignKey('fk_med_places_building_id', '{{%med_places}}', 'building_id', 'med_buildings', 'id');

        $this->createIndex('expertSchedule', '{{%med_schedule}}', 'expert_id', 0);
        $this->addForeignKey('fk_med_schedule_expert_id', '{{%med_schedule}}', 'expert_id', 'med_experts', 'id');

        $this->createIndex('scheduleTemplates', '{{%med_schedule_teplates}}', 'expert_id', 0);
        $this->addForeignKey('fk_med_schedule_teplates_expert_id', '{{%med_schedule_teplates}}', 'expert_id', 'med_experts', 'id');

    }

    public function safeDown()
    {

        $this->dropForeignKey('fk_med_diagnoses_appointments_expert_id', '{{%med_diagnoses_appointments}}');
        $this->dropForeignKey('fk_med_expert_groups_link_expert_id', '{{%med_expert_groups_link}}');
        $this->dropForeignKey('fk_med_expert_patients_link_expert_id', '{{%med_expert_patients_link}}');
        $this->dropForeignKey('fk_med_expert_places_link_expert_id', '{{%med_expert_places_link}}');
        $this->dropForeignKey('fk_med_expert_places_link_place_id', '{{%med_expert_places_link}}');
        $this->dropForeignKey('fk_med_meets_expert_id', '{{%med_meets}}');
        $this->dropForeignKey('fk_med_places_building_id', '{{%med_places}}');
        $this->dropForeignKey('fk_med_schedule_expert_id', '{{%med_schedule}}');
        $this->dropForeignKey('fk_med_schedule_teplates_expert_id', '{{%med_schedule_teplates}}');

    }
}
