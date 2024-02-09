<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "users".
 *
 * @property int $id
 * @property string $name
 * @property string $username
 * @property string|null $email_verified_at
 * @property string $password
 * @property string $status
 * @property string|null $remember_token
 * @property string|null $created_at
 * @property string|null $updated_at
 *
 * @property Notifications[] $notifications
 * @property Stores[] $store
 * @property UserProfiles[] $userProfile
 */
class Users extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'users';
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
            [['name', 'username', 'password'], 'required'],
            [['email_verified_at', 'created_at', 'updated_at'], 'safe'],
            [['status'], 'string'],
            [['name', 'username', 'password'], 'string', 'max' => 255],
            [['remember_token'], 'string', 'max' => 100],
            [['username'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'username' => 'Username',
            'email_verified_at' => 'Email Verified At',
            'password' => 'Password',
            'status' => 'Status',
            'remember_token' => 'Remember Token',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * Gets query for [[Notifications]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getNotifications()
    {
        return $this->hasMany(Notifications::class, ['user_id' => 'id']);
    }

    /**
     * Gets query for [[Stores]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getStore()
    {
        return $this->hasOne(Stores::class, ['user_id' => 'id']);
    }

    /**
     * Gets query for [[UserProfiles]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUserProfile()
    {
        return $this->hasOne(UserProfiles::class, ['user_id' => 'id']);
    }
}
