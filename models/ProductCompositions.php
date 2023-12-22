<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "product_compositions".
 *
 * @property int $id
 * @property int $product_id
 * @property string $name
 * @property string $name_uz
 * @property string $enable
 * @property string|null $created_at
 * @property string|null $updated_at
 *
 * @property Products $product
 */
class ProductCompositions extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product_compositions';
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
            [['product_id', 'name', 'name_uz'], 'required'],
            [['product_id'], 'integer'],
            [['enable'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['name', 'name_uz'], 'string', 'max' => 255],
            [['product_id'], 'exist', 'skipOnError' => true, 'targetClass' => Products::class, 'targetAttribute' => ['product_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'product_id' => 'Product ID',
            'name' => 'Name',
            'name_uz' => 'Name Uz',
            'enable' => 'Включить/Отключить',
            'created_at' => 'Создан',
            'updated_at' => 'Обновлен',
        ];
    }

    /**
     * Gets query for [[Product]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(Products::class, ['id' => 'product_id']);
    }
}
