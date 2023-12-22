<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "partners".
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $name_uz
 * @property string|null $link
 * @property string|null $link_uz
 * @property string $icon
 * @property string|null $icon_uz
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
            [['link', 'link_uz', 'icon', 'icon_uz', 'enable'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['name', 'name_uz'], 'string', 'max' => 255],
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
            'name_uz' => 'Name Uz',
            'link' => 'Link',
            'link_uz' => 'Link Uz',
            'icon' => 'Icon',
            'icon_uz' => 'Icon Uz',
            'enable' => 'Включить/Отключить',
            'created_at' => 'Создан',
            'updated_at' => 'Обновлен',
        ];
    }
}
