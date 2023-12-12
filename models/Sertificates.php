<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "sertificates".
 *
 * @property int $id
 * @property string $image
 * @property string|null $image_uz
 * @property string $enable
 * @property string|null $created_at
 * @property string|null $updated_at
 */
class Sertificates extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'sertificates';
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
            [['image'], 'required'],
            [['image', 'image_uz', 'enable'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'image' => 'Image',
            'image_uz' => 'Image Uz',
            'enable' => 'Enable',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
