<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "products".
 *
 * @property int $id
 * @property string $name
 * @property string|null $name_uz
 * @property string $image
 * @property string $description
 * @property string|null $description_uz
 * @property string $enable
 * @property string|null $created_at
 * @property string|null $updated_at
 *
 * @property Comments[] $comments
 * @property ProductCompositions[] $productCompositions
 * @property ProductImages[] $productImages
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
            [['name', 'image', 'description', 'totalCount'], 'required'],
            [['description', 'description_uz', 'enable'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['name', 'name_uz', 'image'], 'string', 'max' => 255],
            [['totalCount'], 'integer'],
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
            'image' => 'Image',
            'description' => 'Description',
            'description_uz' => 'Description Uz',
            'totalCount' => 'Count',
            'enable' => 'Enable',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * Gets query for [[Comments]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getComments()
    {
        return $this->hasMany(Comments::class, ['product_id' => 'id']);
    }

    /**
     * Gets query for [[ProductCompositions]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProductCompositions()
    {
        return $this->hasMany(ProductCompositions::class, ['product_id' => 'id']);
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
}
