<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "movies".
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $file_id
 * @property string|null $caption
 * @property string|null $code
 * @property int $count
 * @property string|null $created_at
 * @property string|null $updated_at
 */
class Movies extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'movies';
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
            [['name', 'file_id', 'caption', 'code'], 'string'],
            [['count'], 'integer'],
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
            'name' => 'Name',
            'file_id' => 'File ID',
            'caption' => 'Caption',
            'code' => 'Code',
            'count' => 'Count',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
