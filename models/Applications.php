<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "applications".
 *
 * @property int $id
 * @property string $name
 * @property string $phone
 * @property string|null $email
 * @property string $description
 * @property string $type
 * @property string|null $created_at
 * @property string|null $updated_at
 */
class Applications extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'applications';
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
            [['name', 'phone', 'description'], 'required'],
            [['description', 'type'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['name', 'phone', 'email'], 'string', 'max' => 255],
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
            'phone' => 'Phone',
            'email' => 'Email',
            'description' => 'Description',
            'type' => 'Type',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    public static function AppTypes($type=null) {
        $list = [
            'partner' => 'Для партнера',
            'consultation' => 'Для консультации',
            'order' => 'Заказ'
        ];
        if ($type==null) {
            return $list;
        }
        return $list[$type];
    }
}
