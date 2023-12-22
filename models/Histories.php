<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "histories".
 *
 * @property int $id
 * @property string $years
 * @property string $title
 * @property string|null $title_uz
 * @property string|null $title_en
 * @property string|null $description
 * @property string|null $description_uz
 * @property string|null $description_en
 * @property string $enable
 * @property string|null $created_at
 * @property string|null $updated_at
 *
 * @property HistoryImages[] $historyImages
 */
class Histories extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'histories';
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
            [['years', 'title'], 'required'],
            [['title', 'title_uz', 'title_en', 'description', 'description_uz', 'description_en', 'enable'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['years'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'years' => 'Years',
            'title' => 'Title',
            'title_uz' => 'Title Uz',
            'title_en' => 'Title En',
            'description' => 'Description',
            'description_uz' => 'Description Uz',
            'description_en' => 'Description En',
            'enable' => 'Включить/Отключить',
            'created_at' => 'Создан',
            'updated_at' => 'Обновлен',
        ];
    }

    /**
     * Gets query for [[HistoryImages]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHistoryImages()
    {
        return $this->hasMany(HistoryImages::class, ['history_id' => 'id']);
    }
}
