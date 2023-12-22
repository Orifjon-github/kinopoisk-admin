<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "service_images".
 *
 * @property int $id
 * @property int $service_id
 * @property string $image
 * @property string $enable
 * @property string|null $created_at
 * @property string|null $updated_at
 *
 * @property Services $service
 */
class ServiceImages extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'service_images';
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
            [['service_id', 'image'], 'required'],
            [['service_id'], 'integer'],
            [['image', 'enable'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['service_id'], 'exist', 'skipOnError' => true, 'targetClass' => Services::class, 'targetAttribute' => ['service_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'service_id' => 'Service ID',
            'image' => 'Image',
            'enable' => 'Включить/Отключить',
            'created_at' => 'Создан',
            'updated_at' => 'Обновлен',
        ];
    }

    /**
     * Gets query for [[Service]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getService()
    {
        return $this->hasOne(Services::class, ['id' => 'service_id']);
    }
}
