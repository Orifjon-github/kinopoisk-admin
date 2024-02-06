<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "categories".
 *
 * @property int $id
 * @property string $name
 * @property int|null $parent_id
 * @property int $order
 * @property string $enable
 * @property string|null $photo
 * @property string|null $created_at
 * @property string|null $updated_at
 *
 * @property AdditionalFields[] $additionalFields
 * @property Categories[] $categories
 * @property Filters[] $filters
 * @property Categories $parent
 * @property Products[] $products
 */
class Categories extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'categories';
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
            [['name'], 'required'],
            [['parent_id', 'order'], 'integer'],
            [['enable', 'photo'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['name'], 'string', 'max' => 255],
            [['parent_id'], 'exist', 'skipOnError' => true, 'targetClass' => Categories::class, 'targetAttribute' => ['parent_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels(): array
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'parent_id' => 'Parent',
            'order' => 'Order',
            'enable' => 'Enable',
            'photo' => 'Photo',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    public static function all(): array
    {
        $categories = self::find()->select(['id', 'name'])->asArray()->all();

        return ArrayHelper::map($categories, 'id', 'name');
    }

    public function getAdditionalFields(): \yii\db\ActiveQuery
    {
        return $this->hasMany(AdditionalFields::class, ['category_id' => 'id']);
    }

    public function getCategories(): \yii\db\ActiveQuery
    {
        return $this->hasMany(Categories::class, ['parent_id' => 'id']);
    }

    public function getFilters(): \yii\db\ActiveQuery
    {
        return $this->hasMany(Filters::class, ['category_id' => 'id']);
    }

    public function getParent(): \yii\db\ActiveQuery
    {
        return $this->hasOne(Categories::class, ['id' => 'parent_id']);
    }

    public function getProducts(): \yii\db\ActiveQuery
    {
        return $this->hasMany(Products::class, ['category_id' => 'id']);
    }
}
