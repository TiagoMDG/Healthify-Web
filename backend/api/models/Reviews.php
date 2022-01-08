<?php

namespace backend\api\models;

use app\api\models\Meals;
use Yii;

/**
 * This is the model class for table "reviews".
 *
 * @property int $id
 * @property float|null $rating
 * @property string|null $review
 * @property int $userprofilesid
 * @property int $mealsid
 *
 * @property Meals $meals
 * @property Userprofile $userprofiles
 */
class Reviews extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'reviews';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['rating'], 'number'],
            [['userprofilesid', 'mealsid'], 'required'],
            [['userprofilesid', 'mealsid'], 'integer'],
            [['review'], 'string', 'max' => 255],
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
            'rating' => 'Rating',
            'review' => 'Review',
            'userprofilesid' => 'Userprofilesid',
            'mealsid' => 'Mealsid',
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
