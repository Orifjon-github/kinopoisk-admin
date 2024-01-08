<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "services".
 *
 * @property int $id
 * @property string $title
 * @property string|null $title_uz
 * @property string|null $title_en
 * @property string|null $description
 * @property string|null $description_uz
 * @property string|null $description_en
 * @property string|null $image
 * @property string $enable
 * @property string|null $created_at
 * @property string|null $updated_at
 *
 * @property ServiceImages[] $serviceImages
 */
class Services extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'services';
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
            [['title'], 'required'],
            [['title', 'title_uz', 'title_en', 'description', 'description_uz', 'description_en', 'image', 'enable'], 'string'],
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
            'title' => 'Title',
            'title_uz' => 'Title Uz',
            'title_en' => 'Title En',
            'description' => 'Description',
            'description_uz' => 'Description Uz',
            'description_en' => 'Description En',
            'image' => 'Image',
            'enable' => 'Включить/Отключить',
            'created_at' => 'Создан',
            'updated_at' => 'Обновлен',
        ];
    }

    /**
     * Gets query for [[ServiceImages]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getServiceImages()
    {
        return $this->hasMany(ServiceImages::class, ['service_id' => 'id']);
    }
}
