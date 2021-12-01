<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ingredients".
 *
 * @property int $id
 * @property string $name
 * @property float $calories
 * @property float $proteins
 * @property float $carbohidrates
 * @property float $fats
 * @property float $fibers
 * @property float $weight
 *
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
            [['name', 'calories', 'proteins', 'carbohidrates', 'fats', 'fibers', 'weight'], 'required'],
            [['calories', 'proteins', 'carbohidrates', 'fats', 'fibers', 'weight'], 'number'],
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
            'calories' => 'Calories',
            'proteins' => 'Proteins',
            'carbohidrates' => 'Carbohidrates',
            'fats' => 'Fats',
            'fibers' => 'Fibers',
            'weight' => 'Weight',
        ];
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
