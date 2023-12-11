<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "settings".
 *
 * @property int $id
 * @property string $key
 * @property string $value
 * @property string|null $value_uz
 * @property string $enable
 * @property string|null $created_at
 * @property string|null $updated_at
 */
class Settings extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'settings';
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
            [['key', 'value'], 'required'],
            [['value', 'value_uz', 'enable'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['key'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'key' => 'Key',
            'value' => 'Value',
            'value_uz' => 'Value Uz',
            'enable' => 'Enable',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    public static function settingKeys($key): ?string
    {
        $list = [
            'logo' => 'Логотип',
            'email' => 'Электронная почта'
        ];

        return $list[$key] ?? null;
    }
    public static function fileKeys(): array
    {
        return [
            'logo',
            'background_image_partner',
            'about_image',
            'result_video',
            'consultation_image',
            'productBg',
            'contactBg',
            'aboutBg',
            'blogBg',
            'cartBg',
            'favoritesBg',
            'partnerBg',
            'about_video'
        ];
    }
}
