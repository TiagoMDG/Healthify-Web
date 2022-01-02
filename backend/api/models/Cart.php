<?php

namespace backend\api\models;

use Yii;
use app\models\Meals;

/**
 * This is the model class for table "cart".
 *
 * @property int $id
 * @property int $userprofilesid
 * @property int $mealsid
 * @property float $sellingprice
 * @property int $itemquantity
 *
 * @property Meals $meals
 * @property Userprofile $userprofiles
 */
class Cart extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cart';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['userprofilesid', 'mealsid', 'sellingprice', 'itemquantity'], 'required'],
            [['userprofilesid', 'mealsid', 'itemquantity'], 'integer'],
            [['sellingprice'], 'number'],
            [['mealsid'], 'exist', 'skipOnError' => true, 'targetClass' => Meals::className(), 'targetAttribute' => ['mealsid' => 'id']],
            [['userprofilesid'], 'exist', 'skipOnError' => true, 'targetClass' => Userprofile::className(), 'targetAttribute' => ['userprofilesid' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'userprofilesid' => 'Userprofilesid',
            'mealsid' => 'Mealsid',
            'sellingprice' => 'Sellingprice',
            'itemquantity' => 'Itemquantity',
        ];
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

    /**
     * Gets query for [[Userprofiles]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUserprofiles()
    {
        return $this->hasOne(Userprofile::className(), ['id' => 'userprofilesid']);
    }
}
