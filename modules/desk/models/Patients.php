<?php

namespace app\modules\desk\models;

use Yii;

/**
 * This is the model class for table "med_patients".
 *
 * @property int $id
 * @property string $name
 * @property string $surname
 * @property string $patronymic
 * @property string $card_number
 * @property string $sex
 * @property string $birthdate
 * @property int $region_id
 * @property int $district_id
 * @property string $city
 * @property int $city_id
 * @property string $district
 * @property string $district_a
 * @property int $user_id
 * @property string $address
 * @property string $phone
 * @property string $email
 */
class Patients extends \yii\db\ActiveRecord
{

    const SEX_FEMALE = 'female';
    const SEX_MALE = 'male';

    /**
     * @return array
     */
    public static function getSexes()
    {
        return [
            self::SEX_FEMALE => Yii::t('desk', 'female'),
            self::SEX_MALE => Yii::t('desk', 'male'),
        ];
    }


    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'med_patients';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
//            [['name', 'surname', 'patronymic', 'card_number', 'sex', 'birthdate', 'region_id', 'city', 'city_id', 'district', 'district_a', 'user_id'], 'required'],

            [['name', 'surname', 'patronymic', 'card_number', 'sex', 'birthdate', 'region_id', 'user_id'], 'required'],

            [['sex'], 'string'],
            ['address', 'string', 'max' => 128],
            ['phone', 'string', 'max' => 16],
            ['email', 'email'],
            [['birthdate'], 'safe'],
            [['region_id', 'district_id', 'city_id', 'user_id'], 'integer'],
            [['name', 'surname', 'patronymic'], 'string', 'max' => 255],
            [['card_number'], 'string', 'max' => 8],
            [['city'], 'string', 'max' => 64],
            [['district'], 'string', 'max' => 40],
            [['district_a'], 'string', 'max' => 2],
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
            'surname' => Yii::t('desk', 'Surname'),
            'patronymic' => Yii::t('desk', 'Patronymic'),
            'card_number' => Yii::t('desk', 'Card Number'),
            'sex' => Yii::t('desk', 'Sex'),
            'birthdate' => Yii::t('desk', 'Birthdate'),
            'region_id' => Yii::t('desk', 'Region ID'),
            'district_id' => Yii::t('desk', 'District ID'),
            'city' => Yii::t('desk', 'City'),
            'city_id' => Yii::t('desk', 'City ID'),
            'district' => Yii::t('desk', 'District'),
            'district_a' => Yii::t('desk', 'District A'),
            'user_id' => Yii::t('desk', 'User ID'),
            'address' => Yii::t('desk', 'Address'),
            'phone' => Yii::t('desk', 'Phone'),
            'email' => Yii::t('desk', 'Email')
        ];
    }


    /** @return \yii\db\ActiveQuery */
    public function getCoursesList()
    {
        return $this->hasMany(CoursesList::class, ['patient_id' => 'id']);
    }


    /** @return \yii\db\ActiveQuery */
    public function getExcerpts()
    {
        return $this->hasMany(Excerpts::class, ['patient_id' => 'id']);
    }

    /** @return \yii\db\ActiveQuery */
    public function getExpertPatientsLink()
    {
        return $this->hasMany(ExpertPatientsLink::class, ['patient_id' => 'id']);
    }


    /** @return \yii\db\ActiveQuery */
    public function getMeets()
    {
        return $this->hasMany(Meets::class, ['patient_id' => 'id']);
    }

    /** @return \yii\db\ActiveQuery */
    public function getDiagnosesAppointments()
    {
        return $this->hasMany(DiagnosesAppointments::class, ['patient_id' => 'id']);
    }

    /** linked relations */

    /** @return \yii\db\ActiveQuery */
    public function getCourses()
    {
        return $this->hasMany(Experts::class, ['id' => 'course_id'])
            ->via('coursesList');
    }

    /** @return \yii\db\ActiveQuery */
    public function getPlaces()
    {
        return $this->hasMany(Places::class, ['id' => 'place_id'])
            ->via('meets');
    }

    /** @return \yii\db\ActiveQuery */
    public function getExpertGroups()
    {
        return $this->hasMany(ExpertGroups::class, ['id' => 'expert_group_id'])
            ->via('meets');
    }

    /** @return \yii\db\ActiveQuery */
    public function getExperts()
    {
        return $this->hasMany(Experts::class, ['id' => 'experts_id'])
            ->via('meets');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCityOrigin()
    {
        return $this->hasOne(Cities::class, ['id' => 'city_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRegion()
    {
        return $this->hasOne(Regions::class, ['id' => 'region_id']);
    }


    /**
     * @return bool
     */
    public function canUpdate()
    {
        return true;
    }

}
