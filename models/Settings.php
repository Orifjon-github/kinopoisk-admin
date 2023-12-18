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
            'email' => 'Электронная почта',
            'address' => 'Адрес',
            'iframe' => 'Карта',
            'terms_partner_1' => 'Условия партнерства (1)',
            'terms_partner_2' => 'Условия партнерства (2)',
            'background_image_partner' => 'Фоновое изображение для партнера',
            'about_image' => 'Изображение для «О нас»',
            'about_description' => 'Описание для О нас',
            'result_video' => 'Видео для результатов',
            'delivery_text' => 'Текст для доставки',
            'consultation_image' => 'Изображение для консультации',
            'consultation_description' => 'Описание для консультации',
            'consultation_job' => 'Профессия консультанта',
            'consultation_name' => 'Имя консультанта',
            'productBg' => 'Фон для страницы продукта',
            'contactBg' => 'Фон для страницы контактов',
            'aboutBg' => 'Фон для страницы «О нас»',
            'blogBg' => 'Фон для страницы новостей',
            'cartBg' => 'Фон для страницы корзины',
            'favoritesBg' => 'Фон для страницы избранного',
            'partnerBg' => 'Фон для партнерской страницы',
            'about_video' => 'Видео для О нас',
            'result_image' => 'Изображение для результатов',
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
            'about_video',
            'result_image'
        ];
    }

    public static function htmlKeys(): array
    {
        return [
            'delivery_text',
            'terms_partner_1',
            'terms_partner_2',
        ];
    }
}
