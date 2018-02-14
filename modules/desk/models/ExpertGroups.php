<?php

namespace app\modules\desk\models;

use yii2tech\ar\softdelete\SoftDeleteBehavior;
use Yii;

/**
 * This is the model class for table "med_expert_groups".
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property int $patient_required
 * @property int $course_required
 * @property int $excerpt_required
 * @property int $excerpt_order
 * @property string $display_color
 * @property int $deleted
 */
class ExpertGroups extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'med_expert_groups';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['patient_required', 'course_required', 'excerpt_required', 'excerpt_order', 'deleted'], 'integer'],
            [['name', 'description'], 'string', 'max' => 255],
            ['display_color', 'string', 'max' => 16],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('desk', 'ID'),
            'name' => Yii::t('desk', 'Name'),
            'description' => Yii::t('desk', 'Description'),
            'course_required' => Yii::t('desk', 'Course Required'),
            'excerpt_required' => Yii::t('desk', 'Excerpt Required'),
            'excerpt_order' => Yii::t('desk', 'Excerpt Order'),
            'display_color' => Yii::t('desk', 'Dosplay color'),
        ];
    }

    /**
     * @return array
     */
    public function behaviors()
    {
        return [
            'softDeleteBehavior' => [
                'class' => SoftDeleteBehavior::class,
                'softDeleteAttributeValues' => [
                    'deleted' => true
                ],
            ],
        ];
    }

    /**
     * @return $this
     */
    public static function find()
    {
        return parent::find()->where(['deleted' => null]);
    }

    /** @return \yii\db\ActiveQuery */
    public function getMeets()
    {
        return $this->hasMany(Meets::class, ['expert_group_id' => 'id']);
    }

    /** @return \yii\db\ActiveQuery */
    public function getExpertPatientsLink()
    {
        return $this->hasMany(ExpertPatientsLink::class, ['expert_group_id' => 'id']);
    }

    /** @return \yii\db\ActiveQuery */
    public function getSchedule()
    {
        return $this->hasMany(Schedule::class, ['expert_group_id' => 'id']);
    }

    /** @return \yii\db\ActiveQuery */
    public function getScheduleTemplates()
    {
        return $this->hasMany(ScheduleTemplates::class, ['expert_group_id' => 'id']);
    }

    /** @return \yii\db\ActiveQuery */
    public function getPlacesExpertGroupsLink()
    {
        return $this->hasMany(PlacesExpertGroupsLink::class, ['expert_group_id' => 'id']);
    }

    /** @return \yii\db\ActiveQuery */
    public function getExpertGroupsLink()
    {
        return $this->hasMany(ExpertGroupsLink::class, ['expert_group_id' => 'id']);
    }

    /** @return \yii\db\ActiveQuery */
    public function getDiagnosesAppointments()
    {
        return $this->hasMany(DiagnosesAppointments::class, ['expert_group_id' => 'id']);
    }

    /** linked relations */

    /** @return \yii\db\ActiveQuery */
    public function getPlaces()
    {
        return $this->hasMany(Places::class, ['id' => 'place_id'])
            ->via('placesExpertGroupsLink');
    }

    /** @return \yii\db\ActiveQuery */
    public function getExperts()
    {
        return $this->hasMany(Experts::class, ['id' => 'expert_id'])
            ->via('expertGroupsLink');
    }


}
