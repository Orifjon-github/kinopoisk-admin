<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "partners".
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $link
 * @property string|null $link_uz
 * @property string|null $link_en
 * @property string $icon
 * @property string|null $icon_uz
 * @property string|null $icon_en
 * @property string $enable
 * @property string|null $created_at
 * @property string|null $updated_at
 */
class Partners extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'partners';
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
            [['link', 'link_uz', 'link_en', 'icon', 'icon_uz', 'icon_en', 'enable'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['name'], 'string', 'max' => 255],
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
            'link' => 'Link',
            'link_uz' => 'Link Uz',
            'link_en' => 'Link En',
            'icon' => 'Icon',
            'icon_uz' => 'Icon Uz',
            'icon_en' => 'Icon En',
            'enable' => 'Включить/Отключить',
            'created_at' => 'Создан',
            'updated_at' => 'Обновлен',
        ];
    }
}
