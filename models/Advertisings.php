<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "advertising's".
 *
 * @property int $id
 * @property string $title
 * @property string|null $title_uz
 * @property string $description
 * @property string|null $description_uz
 * @property string|null $link
 * @property string|null $link_uz
 * @property string|null $image
 * @property string|null $image_uz
 * @property string $enable
 * @property string|null $created_at
 * @property string|null $updated_at
 */
class Advertisings extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'advertisings';
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
            [['title', 'description'], 'required'],
            [['description', 'description_uz', 'image', 'image_uz', 'enable', 'link', 'link_uz'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['title', 'title_uz'], 'string', 'max' => 255],
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
            'description' => 'Description',
            'link' => 'Link',
            'link_uz' => 'Link Uz',
            'description_uz' => 'Description Uz',
            'image' => 'Image',
            'image_uz' => 'Image Uz',
            'enable' => 'Включить/Отключить',
            'created_at' => 'Создан',
            'updated_at' => 'Обновлен',
        ];
    }
}
