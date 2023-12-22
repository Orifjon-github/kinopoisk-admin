<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "posts".
 *
 * @property int $id
 * @property string $title
 * @property string|null $title_uz
 * @property string|null $image
 * @property string $description
 * @property string|null $description_uz
 * @property string|null $short_description
 * @property string|null $short_description_uz
 * @property string $enable
 * @property string|null $created_at
 * @property string|null $updated_at
 *
 * @property PostImages[] $postImages
 */
class Posts extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'posts';
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
            [['image', 'description', 'description_uz','short_description', 'short_description_uz', 'enable'], 'string'],
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
            'image' => 'Image',
            'description' => 'Description',
            'description_uz' => 'Description Uz',
            'short_description' => 'Short Description',
            'short_description_uz' => 'Short Description Uz',
            'enable' => 'Включить/Отключить',
            'created_at' => 'Создан',
            'updated_at' => 'Обновлен',
        ];
    }

    /**
     * Gets query for [[PostImages]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPostImages()
    {
        return $this->hasMany(PostImages::class, ['post_id' => 'id']);
    }
}
