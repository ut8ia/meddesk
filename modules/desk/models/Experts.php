<?php

namespace app\modules\desk\models;


use yii2tech\ar\softdelete\SoftDeleteBehavior;
use yii2tech\ar\file\ImageFileBehavior;
use yii\db\ActiveRecord;
use Yii;

/**
 * This is the model class for table "med_experts".
 *
 * @property int $id
 * @property string $username
 * @property string $auth_key
 * @property string $password_hash
 * @property string $password_reset_token
 * @property integer $password_change
 * @property string $email
 * @property string $status
 * @property int $created_at
 * @property int $updated_at
 * @property string $surname
 * @property string $name
 * @property string $patronymic
 * @property string $short_info
 * @property string $info
 * @property string $specialization
 * @property string $slug
 * @property int $deleted
 */
class Experts extends ActiveRecord
{

    const STATUS_NEW = 'new';
    const STATUS_ACTIVE = 'active';
    const STATUS_BLOCKED = 'blocked';

    /**
     * @return array
     */
    public static function getStatuses()
    {
        return [
            self::STATUS_NEW => Yii::t('app', 'new'),
            self::STATUS_ACTIVE => Yii::t('app', 'active'),
            self::STATUS_BLOCKED => Yii::t('app', 'blocked'),
        ];
    }

    /** @return string */
    public static function tableName()
    {
        return 'med_experts';
    }

    /** @return array */
    public function rules()
    {
        return [
            [['status', 'surname', 'name', 'patronymic'], 'required'],
            [['status'], 'string'],
            [['password_change', 'deleted'], 'integer'],
            [['created_at', 'updated_at'], 'integer'],
            [['username'], 'string', 'max' => 64],
            [['auth_key'], 'string', 'max' => 32],
            [['password_hash', 'password_reset_token', 'slug'], 'string', 'max' => 255],
            [['email'], 'string', 'max' => 128],
            [['surname', 'name', 'patronymic', 'specialization'], 'string', 'max' => 127],
            [['short_info'], 'string', 'max' => 256],
            [['info'], 'string', 'max' => 2056],
        ];
    }

    /** @return array */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'username' => Yii::t('app', 'Username'),
            'auth_key' => Yii::t('app', 'Auth Key'),
            'password_hash' => Yii::t('app', 'Password Hash'),
            'password_reset_token' => Yii::t('app', 'Password Reset Token'),
            'email' => Yii::t('app', 'Email'),
            'status' => Yii::t('app', 'Status'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'surname' => Yii::t('app', 'Surname'),
            'name' => Yii::t('app', 'Name'),
            'patronymic' => Yii::t('app', 'Patronymic'),
            'short_info' => Yii::t('app', 'Short Info'),
            'info' => Yii::t('app', 'Info'),
            'specialization' => Yii::t('app', 'Specialization'),
            'slug' => Yii::t('app', 'Slug'),
        ];
    }

    /**
     * @return array
     */
    public function behaviors()
    {
        return [
            'file' => [
                'class' => ImageFileBehavior::class,
                'fileStorageBucket' => 'experts_images',
                'fileExtensionAttribute' => 'file_extension',
                'fileVersionAttribute' => 'file_version',
                'fileTransformations' => [
                    'origin', // no resize
                    'main' => [500, 500],
                    'thumbnail' => [200, 200],
                    'small' => [100, 100],
                    'icon' => [20, 20],
                ],
            ],
            'softDeleteBehavior' => [
                'class' => SoftDeleteBehavior::class,
                'softDeleteAttributeValues' => [
                    'deleted' => true
                ],
            ],
        ];
    }

    /** @return $this */
    public static function find()
    {
        return parent::find()->where(['deleted' => null]);
    }


    /** @return string */
    public function getImageOrigin()
    {
        return $this->fileExists() ? $this->getFileUrl('origin') : self::getDefaultImage();
    }

    /** @return string */
    public function getImageMain()
    {
        return $this->fileExists() ? $this->getFileUrl('main') : self::getDefaultImage();
    }

    /** @return string */
    public function getImageThumbnail()
    {
        return $this->fileExists() ? $this->getFileUrl('thumbnail') : self::getDefaultImage();
    }

    /** @return string */
    public function getImageSmall()
    {
        return $this->fileExists() ? $this->getFileUrl('small') : self::getDefaultImage();
    }

    /** @return string */
    public function getImageIcon()
    {
        return $this->fileExists() ? $this->getFileUrl('main') : self::getDefaultImage();
    }

    /**
     * Return default image
     * @return bool|string
     */
    public static function getDefaultImage()
    {
        return Yii::getAlias('@storageUrl/storage/placeholder/240x240.png');
    }


    /**
     * Generates password hash from password and sets it to the model
     *
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password_hash = Yii::$app->security->generatePasswordHash($password);
    }

    /** @return \yii\db\ActiveQuery */
    public function getMeets()
    {
        return $this->hasMany(ExpertGroupsLink::class, ['expert_id' => 'id']);
    }

    /** @return \yii\db\ActiveQuery */
    public function getExpertGroupsLink()
    {
        return $this->hasMany(ExpertGroupsLink::class, ['expert_id' => 'id']);
    }

    /** @return \yii\db\ActiveQuery */
    public function getExpertPlacesLink()
    {
        return $this->hasMany(ExpertPlacesLink::class, ['expert_id' => 'id']);
    }

    /** @return \yii\db\ActiveQuery */
    public function getScheduleTemplates()
    {
        return $this->hasMany(ScheduleTemplates::class, ['expert_id' => 'id']);
    }

    /** @return \yii\db\ActiveQuery */
    public function getSchedule()
    {
        return $this->hasMany(Schedule::class, ['expert_id' => 'id']);
    }

    /** @return \yii\db\ActiveQuery */
    public function getExpertPatientsLink()
    {
        return $this->hasMany(ExpertPatientsLink::class, ['expert_id' => 'id']);
    }

    /** @return \yii\db\ActiveQuery */
    public function getDiagnosesAppointments()
    {
        return $this->hasMany(DiagnosesAppointments::class, ['expert_id' => 'id']);
    }

    /** linked relations */

    /** @return \yii\db\ActiveQuery */
    public function getPlaces()
    {
        return $this->hasMany(Places::class, ['id' => 'place_id'])
            ->via('expertPlacesLink');
    }

    /** @return \yii\db\ActiveQuery */
    public function getExpertGroups()
    {
        return $this->hasMany(ExpertGroups::class, ['id' => 'expert_group_id'])
            ->via('expertGroupsLink');
    }

    /** @return \yii\db\ActiveQuery */
    public function getPatients()
    {
        return $this->hasMany(Patients::class, ['id' => 'patient_id'])
            ->via('expertPatientsLink');
    }

}
