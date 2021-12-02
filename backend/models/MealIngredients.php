<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "meal_ingredients".
 *
 * @property int $id
 * @property int $mealsid
 * @property int $ingredientsid
 *
 * @property Ingredients $ingredients
 * @property Meals $meals
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
            [['mealsid', 'ingredientsid'], 'required'],
            [['mealsid', 'ingredientsid'], 'integer'],
            [['ingredientsid'], 'exist', 'skipOnError' => true, 'targetClass' => Ingredients::className(), 'targetAttribute' => ['ingredientsid' => 'id']],
            [['mealsid'], 'exist', 'skipOnError' => true, 'targetClass' => Meals::className(), 'targetAttribute' => ['mealsid' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'mealsid' => 'Mealsid',
            'ingredientsid' => 'Ingredientsid',
        ];
    }

    /**
     * Gets query for [[Ingredients]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIngredients()
    {
        return $this->hasOne(Ingredients::className(), ['id' => 'ingredientsid']);
    }

    /**
     * Gets query for [[Meals]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMeals()
    {
        return $this->hasOne(Meals::className(), ['id' => 'mealsid']);
    }
}
