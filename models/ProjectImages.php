<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "project_images".
 *
 * @property int $id
 * @property int $project_id
 * @property string $image
 * @property string $enable
 * @property string|null $created_at
 * @property string|null $updated_at
 *
 * @property Projects $project
 */
class ProjectImages extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'project_images';
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
            [['project_id', 'image'], 'required'],
            [['project_id'], 'integer'],
            [['image', 'enable'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['project_id'], 'exist', 'skipOnError' => true, 'targetClass' => Projects::class, 'targetAttribute' => ['project_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'project_id' => 'Project ID',
            'image' => 'Image',
            'enable' => 'Включить/Отключить',
            'created_at' => 'Создан',
            'updated_at' => 'Обновлен',
        ];
    }

    /**
     * Gets query for [[Project]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProject()
    {
        return $this->hasOne(Projects::class, ['id' => 'project_id']);
    }
}
