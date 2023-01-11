<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;

/**
 * This is the model class for table "rate".
 *
 * @property int $id
 * @property int $currency
 * @property string $client
 * @property float $amount
 * @property string $from
 * @property string|null $to
 * @property string|null $created_at
 * @property string|null $updated_at
 */
class Rate extends \yii\db\ActiveRecord
{
    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::class,
                'value' => new Expression('NOW()')
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'rate';
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
            [['amount'], 'required'],
            [['currency'], 'integer'],
            [['client'], 'string'],
            [['amount'], 'number'],
            [['from', 'to', 'created_at', 'updated_at'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'currency' => 'Currency',
            'client' => 'Client',
            'amount' => 'Курс',
            'from' => 'С какого момента',
            'to' => 'To',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
