<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "results".
 *
 * @property int $id
 * @property string $count
 * @property string $name
 * @property string|null $name_uz
 * @property string $enable
 * @property string|null $created_at
 * @property string|null $updated_at
 */
class Results extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'results';
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
            [['count', 'name'], 'required'],
            [['enable'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['count', 'name', 'name_uz'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'count' => 'Count',
            'name' => 'Name',
            'name_uz' => 'Name Uz',
            'enable' => 'Enable',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
