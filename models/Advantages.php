<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "advantages".
 *
 * @property int $id
 * @property string|null $icon
 * @property string $title
 * @property string|null $title_uz
 * @property string|null $description
 * @property string|null $description_uz
 * @property string $enable
 * @property string|null $created_at
 * @property string|null $updated_at
 */
class Advantages extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'advantages';
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
            [['icon', 'description', 'description_uz', 'enable'], 'string'],
            [['title'], 'required'],
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
            'icon' => 'Icon',
            'title' => 'Title',
            'title_uz' => 'Title Uz',
            'description' => 'Description',
            'description_uz' => 'Description Uz',
            'enable' => 'Включить/Отключить',
            'created_at' => 'Создан',
            'updated_at' => 'Обновлен',
        ];
    }
}
