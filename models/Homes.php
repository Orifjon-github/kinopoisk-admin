<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "homes".
 *
 * @property int $id
 * @property string $title
 * @property string|null $title_uz
 * @property string|null $description
 * @property string|null $description_uz
 * @property string|null $image
 * @property string|null $image_uz
 * @property string $enable
 * @property string|null $created_at
 * @property string|null $updated_at
 */
class Homes extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'homes';
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
            [['title', 'title_uz', 'image', 'image_uz', 'enable'], 'string'],
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
//            'description' => 'Description',
//            'description_uz' => 'Description Uz',
            'image' => 'Image',
            'image_uz' => 'Image Uz',
            'enable' => 'Включить/Отключить',
            'created_at' => 'Создан',
            'updated_at' => 'Обновлен',
        ];
    }
}
