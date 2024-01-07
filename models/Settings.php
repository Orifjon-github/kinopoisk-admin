<?php

namespace app\models;

use Yii;
use yii\web\Response;

/**
 * This is the model class for table "settings".
 *
 * @property int $id
 * @property string $key
 * @property string $value
 * @property string|null $value_uz
 * @property string|null $value_en
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
            [['value', 'value_uz','value_en', 'enable'], 'string'],
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
            'key' => 'Ключ',
            'value' => 'Ценить',
            'value_uz' => 'Ценить по-узбекски',
            'value_en' => 'Ценить по-английски',
            'enable' => 'Включить/Отключить',
            'created_at' => 'Создан',
            'updated_at' => 'Обновлен',
        ];
    }

    public static function settingKeys($key): ?string
    {
        $list = [
            'logo' => 'Логотип',
            'email' => 'Электронная почта',
            'address' => 'Адрес',
            'iframe' => 'Карта',
            'terms_partner' => 'Условия партнерства',
            'terms_partner_2' => 'Условия партнерства (2)',
            'background_image_partner' => 'Фоновое изображение для партнера',
            'about_image' => 'Изображение для «О нас»',
            'about_short_description' => 'Краткое описание для «О нас»',
            'about_image2' => 'Изображение для «О нас» (2)',
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
            'advantageBg' => 'Фон для страницы «Преимущества»',
            'consultationBg' => 'Фон для страницы «Консультации»',
            'galleryBg' => 'Фон для страницы «Галереи»',
            'about_video' => 'Видео для О нас',
            'about_video_image' => 'Изображение для видео «О нас»',
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
            'about_video_image',
            'about_image2',
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
            'result_image',
            'advantageBg',
            'consultationBg'
        ];
    }

    public static function htmlKeys(): array
    {
        return [
            'about_description',
            'terms_partner_1',
            'terms_partner_2',
        ];
    }
}
