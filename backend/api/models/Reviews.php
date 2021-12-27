<?php

namespace backend\api\models;

use Yii;

/**
 * This is the model class for table "reviews".
 *
 * @property int $id
 * @property float|null $rating
 * @property string|null $review
 * @property int $userprofilesid
 * @property int $salesmealsid
 *
 * @property SalesMeals $salesmeals
 * @property Userprofiles $userprofiles
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
            [['userprofilesid', 'salesmealsid'], 'required'],
            [['userprofilesid', 'salesmealsid'], 'integer'],
            [['review'], 'string', 'max' => 255],
            [['salesmealsid'], 'exist', 'skipOnError' => true, 'targetClass' => SalesMeals::className(), 'targetAttribute' => ['salesmealsid' => 'id']],
            [['userprofilesid'], 'exist', 'skipOnError' => true, 'targetClass' => Userprofiles::className(), 'targetAttribute' => ['userprofilesid' => 'id']],
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
            'salesmealsid' => 'Salesmealsid',
        ];
    }

    /**
     * Gets query for [[Salesmeals]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSalesmeals()
    {
        return $this->hasOne(SalesMeals::className(), ['id' => 'salesmealsid']);
    }

    /**
     * Gets query for [[Userprofiles]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUserprofiles()
    {
        return $this->hasOne(Userprofiles::className(), ['id' => 'userprofilesid']);
    }
}
