<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "products".
 *
 * @property int $id
 * @property int|null $category_id
 * @property int|null $store_id
 * @property string $name
 * @property string|null $title
 * @property string $image
 * @property string|null $description
 * @property int $price
 * @property string $currency
 * @property string $enable
 * @property string $availability
 * @property string $sale_type
 * @property string|null $additional_fields
 * @property string|null $created_at
 * @property string|null $updated_at
 *
 * @property Categories $category
 * @property ProductImages[] $productImages
 * @property Stores $store
 */
class Products extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'products';
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
            [['category_id', 'store_id', 'price'], 'integer'],
            [['name', 'price'], 'required'],
            [['currency', 'enable', 'availability', 'sale_type', 'additional_fields'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['name', 'title', 'image', 'description'], 'string', 'max' => 255],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Categories::class, 'targetAttribute' => ['category_id' => 'id']],
            [['store_id'], 'exist', 'skipOnError' => true, 'targetClass' => Stores::class, 'targetAttribute' => ['store_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'category_id' => 'Category ID',
            'store_id' => 'Store ID',
            'name' => 'Name',
            'title' => 'Title',
            'image' => 'Image',
            'description' => 'Description',
            'price' => 'Price',
            'currency' => 'Currency',
            'enable' => 'Enable',
            'availability' => 'Availability',
            'sale_type' => 'Sale Type',
            'additional_fields' => 'Additional Fields',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * Gets query for [[Category]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Categories::class, ['id' => 'category_id']);
    }

    /**
     * Gets query for [[ProductImages]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProductImages()
    {
        return $this->hasMany(ProductImages::class, ['product_id' => 'id']);
    }

    /**
     * Gets query for [[Store]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getStore()
    {
        return $this->hasOne(Stores::class, ['id' => 'store_id']);
    }
}
