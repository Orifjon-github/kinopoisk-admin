<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "projects".
 *
 * @property int $id
 * @property string $title
 * @property string|null $title_uz
 * @property string|null $title_en
 * @property string|null $image
 * @property string $short_description
 * @property string|null $short_description_uz
 * @property string|null $short_description_en
 * @property string $description
 * @property string|null $description_uz
 * @property string|null $description_en
 * @property string $enable
 * @property string|null $created_at
 * @property string|null $updated_at
 *
 * @property ProjectImages[] $projectImages
 */
class Projects extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'projects';
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
            [['title', 'short_description', 'description'], 'required'],
            [['image', 'short_description', 'short_description_uz', 'short_description_en', 'description', 'description_uz', 'description_en', 'enable'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['title', 'title_uz', 'title_en'], 'string', 'max' => 255],
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
            'image' => 'Image',
            'short_description' => 'Short Description',
            'short_description_uz' => 'Short Description Uz',
            'short_description_en' => 'Short Description En',
            'description' => 'Description',
            'description_uz' => 'Description Uz',
            'description_en' => 'Description En',
            'enable' => 'Включить/Отключить',
            'created_at' => 'Создан',
            'updated_at' => 'Обновлен',
        ];
    }

    /**
     * Gets query for [[ProjectImages]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProjectImages()
    {
        return $this->hasMany(ProjectImages::class, ['project_id' => 'id']);
    }
}
