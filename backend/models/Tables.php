<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tables".
 *
 * @property int $id
 * @property string $ocupancy_state
 *
 * @property Reservations[] $reservations
 */
class Tables extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tables';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ocupancy_state'], 'required'],
            [['ocupancy_state'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'ocupancy_state' => 'Ocupancy State',
        ];
    }

    /**
     * Gets query for [[Reservations]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getReservations()
    {
        return $this->hasMany(Reservations::className(), ['tableid' => 'id']);
    }
}
