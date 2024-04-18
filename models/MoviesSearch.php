<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Movies;

/**
 * MoviesSearch represents the model behind the search form of `app\models\Movies`.
 */
class MoviesSearch extends Movies
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'count'], 'integer'],
            [['name', 'file_id', 'caption', 'code', 'created_at', 'updated_at'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Movies::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'count' => $this->count,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'file_id', $this->file_id])
            ->andFilterWhere(['like', 'caption', $this->caption])
            ->andFilterWhere(['like', 'code', $this->code]);

        return $dataProvider;
    }
}
