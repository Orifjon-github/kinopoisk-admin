<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "capabilities".
 *
 * @property int $id
 * @property string|null $title
 * @property string|null $title_uz
 * @property string $image
 * @property string $enable
 * @property string|null $created_at
 * @property string|null $updated_at
 */
class Capabilities extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'capabilities';
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
            [['image', 'enable'], 'string'],
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
            'enable' => 'Enable',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
