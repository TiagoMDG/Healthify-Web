<?php

namespace app\models;

use common\models\User;
use Yii;

/**
 * This is the model class for table "reservations".
 *
 * @property int $id
 * @property string $reservedday
 * @property string $reservedtime
 * @property int $userprofilesid
 * @property int $tableid
 *
 * @property Tables $table
 * @property User $userprofiles
 */
class Reservations extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'reservations';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['reservedday', 'reservedtime', 'userprofilesid', 'tableid'], 'required'],
            [['reservedday'], 'safe'],
            [['reservedtime'], 'string'],
            [['userprofilesid', 'tableid'], 'integer'],
            [['tableid'], 'exist', 'skipOnError' => true, 'targetClass' => Tables::className(), 'targetAttribute' => ['tableid' => 'id']],
            [['userprofilesid'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['userprofilesid' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'reservedday' => 'Reservedday',
            'reservedtime' => 'Reservedtime',
            'userprofilesid' => 'Userprofilesid',
            'tableid' => 'Tableid',
        ];
    }

    /**
     * Gets query for [[Table]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTable()
    {
        return $this->hasOne(Tables::className(), ['id' => 'tableid']);
    }

    /**
     * Gets query for [[Userprofiles]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUserprofiles()
    {
        return $this->hasOne(User::className(), ['id' => 'userprofilesid']);
    }
}
