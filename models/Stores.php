<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "stores".
 *
 * @property int $id
 * @property int|null $user_id
 * @property string $name
 * @property string|null $description
 * @property string $image
 * @property string $status
 * @property string|null $address
 * @property string|null $banner_1
 * @property string|null $banner_2
 * @property string|null $banner_3
 * @property string|null $created_at
 * @property string|null $updated_at
 *
 * @property Products[] $products
 * @property Users $user
 */
class Stores extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'stores';
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
            [['user_id'], 'integer'],
            [['name'], 'required'],
            [['description', 'status', 'address', 'banner_1', 'banner_2', 'banner_3'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['name', 'image'], 'string', 'max' => 255],
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
            'name' => 'Name',
            'description' => 'Description',
            'image' => 'Image',
            'status' => 'Status',
            'address' => 'Address',
            'banner_1' => 'Banner 1',
            'banner_2' => 'Banner 2',
            'banner_3' => 'Banner 3',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * Gets query for [[Products]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProducts()
    {
        return $this->hasMany(Products::class, ['store_id' => 'id']);
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
