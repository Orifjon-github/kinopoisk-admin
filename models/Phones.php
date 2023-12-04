<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "phones".
 *
 * @property int $id
 * @property string|null $place
 * @property string $number
 * @property string $enable
 * @property string|null $created_at
 * @property string|null $updated_at
 */
class Phones extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'phones';
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
            [['number'], 'required'],
            [['enable'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['place', 'number'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'place' => 'Place',
            'number' => 'Number',
            'enable' => 'Enable',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
