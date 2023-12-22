<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "history_images".
 *
 * @property int $id
 * @property int $history_id
 * @property string $image
 * @property string $enable
 * @property string|null $created_at
 * @property string|null $updated_at
 *
 * @property Histories $history
 */
class HistoryImages extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'history_images';
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
            [['history_id', 'image'], 'required'],
            [['history_id'], 'integer'],
            [['image', 'enable'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['history_id'], 'exist', 'skipOnError' => true, 'targetClass' => Histories::class, 'targetAttribute' => ['history_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'history_id' => 'History ID',
            'image' => 'Image',
            'enable' => 'Включить/Отключить',
            'created_at' => 'Создан',
            'updated_at' => 'Обновлен',
        ];
    }

    /**
     * Gets query for [[History]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHistory()
    {
        return $this->hasOne(Histories::class, ['id' => 'history_id']);
    }
}
