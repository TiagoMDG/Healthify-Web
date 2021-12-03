<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ingredients".
 *
 * @property int $id
 * @property string $name
 * @property float $sugar_g
 * @property float $calories
 * @property float $protein_g
 * @property float $carbohydrates_total_g
 * @property float $fat_saturated_g
 * @property float $fat_total_g
 * @property float $fiber_g
 * @property float $cholesterol_mg
 *
 * @property MealIngredients[] $mealIngredients
 * @property Minerals[] $minerals
 * @property Vitamins[] $vitamins
 */
class Ingredients extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ingredients';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'sugar_g', 'calories', 'protein_g', 'carbohydrates_total_g', 'fat_saturated_g', 'fat_total_g', 'fiber_g', 'cholesterol_mg'], 'required'],
            [['sugar_g', 'calories', 'protein_g', 'carbohydrates_total_g', 'fat_saturated_g', 'fat_total_g', 'fiber_g', 'cholesterol_mg'], 'number'],
            [['name'], 'string', 'max' => 15],
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
            'sugar_g' => 'Sugar G',
            'calories' => 'Calories',
            'protein_g' => 'Protein G',
            'carbohydrates_total_g' => 'Carbohydrates Total G',
            'fat_saturated_g' => 'Fat Saturated G',
            'fat_total_g' => 'Fat Total G',
            'fiber_g' => 'Fiber G',
            'cholesterol_mg' => 'Cholesterol Mg',
        ];
    }

    /**
     * Gets query for [[MealIngredients]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMealIngredients()
    {
        return $this->hasMany(MealIngredients::className(), ['ingredientsid' => 'id']);
    }

    /**
     * Gets query for [[Minerals]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMinerals()
    {
        return $this->hasMany(Minerals::className(), ['ingredientsid' => 'id']);
    }

    /**
     * Gets query for [[Vitamins]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getVitamins()
    {
        return $this->hasMany(Vitamins::className(), ['ingredientsid' => 'id']);
    }
}
