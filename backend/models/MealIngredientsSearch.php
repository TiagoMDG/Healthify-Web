<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\MealIngredients;

/**
 * MealIngredientsSearch represents the model behind the search form of `app\models\MealIngredients`.
 */
class MealIngredientsSearch extends MealIngredients
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['mealsid', 'ingredientsid'], 'integer'],
            [['ammout'], 'number'],
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
        $query = MealIngredients::find();

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
            'mealsid' => $this->mealsid,
            'ingredientsid' => $this->ingredientsid,
            'ammout' => $this->ammout,
        ]);

        return $dataProvider;
    }
}
