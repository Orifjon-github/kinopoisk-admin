<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user_profiles".
 *
 * @property int $id
 * @property int|null $user_id
 * @property string|null $description
 * @property string $profile_photo
 * @property int|null $country_id
 * @property int|null $region_id
 * @property int|null $district_id
 * @property string|null $address
 * @property string|null $contact
 * @property string|null $created_at
 * @property string|null $updated_at
 *
 * @property Countries $country
 * @property Districts $district
 * @property Regions $region
 * @property Users $user
 */
class UserProfiles extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user_profiles';
    }

    /**
     * @return \yii\db\Connection the database connection used by this AR class.
     */
    public static function getDb()
    {
        return Yii::$app->get('db2');
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'country_id', 'region_id', 'district_id'], 'integer'],
            [['description', 'address', 'contact'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['profile_photo'], 'string', 'max' => 255],
            [['country_id'], 'exist', 'skipOnError' => true, 'targetClass' => Countries::class, 'targetAttribute' => ['country_id' => 'id']],
            [['district_id'], 'exist', 'skipOnError' => true, 'targetClass' => Districts::class, 'targetAttribute' => ['district_id' => 'id']],
            [['region_id'], 'exist', 'skipOnError' => true, 'targetClass' => Regions::class, 'targetAttribute' => ['region_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => Users::class, 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'description' => 'Description',
            'profile_photo' => 'Profile Photo',
            'country_id' => 'Country ID',
            'region_id' => 'Region ID',
            'district_id' => 'District ID',
            'address' => 'Address',
            'contact' => 'Contact',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * Gets query for [[Country]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCountry()
    {
        return $this->hasOne(Countries::class, ['id' => 'country_id']);
    }

    /**
     * Gets query for [[District]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDistrict()
    {
        return $this->hasOne(Districts::class, ['id' => 'district_id']);
    }

    /**
     * Gets query for [[Region]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRegion()
    {
        return $this->hasOne(Regions::class, ['id' => 'region_id']);
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(Users::class, ['id' => 'user_id']);
    }
}
