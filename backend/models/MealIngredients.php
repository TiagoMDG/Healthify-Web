<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "meal_ingredients".
 *
 * @property int $mealsid
 * @property int $ingredientsid
 * @property float $ammout
 */
class MealIngredients extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'meal_ingredients';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['mealsid', 'ingredientsid', 'ammout'], 'required'],
            [['mealsid', 'ingredientsid'], 'integer'],
            [['ammout'], 'number'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'mealsid' => 'Id Refeições',
            'ingredientsid' => 'Id Ingredientes',
            'ammout' => 'Quantidade',
        ];
    }
}
