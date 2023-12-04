<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "faqs".
 *
 * @property int $id
 * @property string $question
 * @property string|null $question_uz
 * @property string $answer
 * @property string|null $answer_uz
 * @property string $enable
 * @property string|null $created_at
 * @property string|null $updated_at
 */
class Faqs extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'faqs';
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
            [['question', 'answer'], 'required'],
            [['question', 'question_uz', 'answer', 'answer_uz', 'enable'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'question' => 'Question',
            'question_uz' => 'Question Uz',
            'answer' => 'Answer',
            'answer_uz' => 'Answer Uz',
            'enable' => 'Enable',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
