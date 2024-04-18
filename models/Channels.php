<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "channels".
 *
 * @property int $id
 * @property string|null $name
 * @property string $chat_id
 * @property string $link
 * @property string|null $created_at
 * @property string|null $updated_at
 */
class Channels extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'channels';
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
            [['name', 'chat_id', 'link'], 'string'],
            [['chat_id', 'link'], 'required'],
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
            'chat_id' => 'Chat ID',
            'link' => 'Link',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
