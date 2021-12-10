<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "category".
 *
 * @property int $id
 * @property string $name
 * @property string|null $description
 *
 * @property Meals[] $meals
 */
class Category extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'category';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 50],
            [['description'], 'string', 'max' => 255],
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
            'description' => 'Description',
        ];
    }

    public static function getCategorias()
    {
        return Category::find()->all();
    }

    public static function getCategoryNamesArray()
    {
        $categories = Category::find()->all();

        foreach ($categories as $category) {
            $categoryNamesArray[] = $category['name'];
        }

        return $categoryNamesArray;
    }

    public static function getCategoryIDArray()
    {
        $categories = Category::find()->all();

        foreach ($categories as $category) {
            $categoryIDArray[] = $category['id'];
        }

        return $categoryIDArray;
    }

    public static function getCategoriaById($id)
    {
        return Category::findOne($id);
    }

    public static function getCategoriaIDByName($nome)
    {
        $idArray = self::getCategoryIDArray();
        $namesArray = self::getCategoryNamesArray();

        $a = array_combine($idArray, $namesArray);

        foreach ($a as $aa => $names) {
            if ($nome == $names) {
                $id = $aa;
            }
        }

        return $id;
    }

    /**
     * Gets query for [[Meals]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMeals()
    {
        return $this->hasMany(Meals::className(), ['categoryid' => 'id']);
    }
}
