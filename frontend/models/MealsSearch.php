<?php

namespace frontend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Meals;

/**
 * MealsSearch represents the model behind the search form of `app\models\Meals`.
 */
class MealsSearch extends Meals
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['name', 'description', 'category'], 'safe'],
            [['totalcalories', 'totalproteins', 'totalcarbohidrates', 'totalfats', 'totalfibers', 'price'], 'number'],
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
        $query = Meals::find();

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
            'totalcalories' => $this->totalcalories,
            'totalproteins' => $this->totalproteins,
            'totalcarbohidrates' => $this->totalcarbohidrates,
            'totalfats' => $this->totalfats,
            'totalfibers' => $this->totalfibers,
            'price' => $this->price,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'category', $this->category]);

        return $dataProvider;
    }
}
