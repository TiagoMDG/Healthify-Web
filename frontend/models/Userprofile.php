<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "userprofiles".
 *
 * @property int $id
 * @property int $nif
 * @property string $name
 * @property int $cellphone
 * @property string $street
 * @property int $door
 * @property int|null $floor
 * @property string $city
 * @property string|null $nib
 * @property int $userid
 *
 * @property Cart[] $carts
 * @property Reservation[] $reservations
 * @property Review[] $reviews
 * @property Sale[] $sales
 * @property SalesState[] $salesStates
 * @property User $user
 * @property Userschedulesregistry[] $userschedulesregistries
 */
use common\models\User;

class Userprofile extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'userprofiles';
    }

    /**
     * {@inheritdoc}
     */

    public $name;
    public $nif;
    public $cellphone;
    public $street;
    public $door;
    public $floor;
    public $city;
    public $userid;

    public function completesignup()
    {
        if (!$this->validate()) {
            return null;
        }

        $userinfo = new Userprofile();
        $userinfo->name=$this->name;
        $userinfo->nif=$this->nif;
        $userinfo->cellphone=$this->cellphone;
        $userinfo->street=$this->street;
        $userinfo->door=$this->door;
        $userinfo->floor=$this->floor;
        $userinfo->city=$this->city;
        $userinfo->userid = \app\models\User::getLastId();

        $userinfo->save(false);
        return  $userinfo;
    }

    public function rules()
    {
        return [
            [['nif', 'name', 'cellphone', 'street', 'door', 'city', 'userid'], 'required'],
            [['nif', 'cellphone', 'door', 'floor', 'userid'], 'integer'],
            [['name', 'street'], 'string', 'max' => 20],
            [['city'], 'string', 'max' => 15],
            [['nib'], 'string', 'max' => 25],
            [['userid'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['userid' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nif' => 'Nif',
            'name' => 'Nome',
            'cellphone' => 'Nº Telemóvel',
            'street' => 'Rua',
            'door' => 'Nº Porta',
            'floor' => 'Andar',
            'city' => 'Cidade',
            'nib' => 'Nib',
            'userid' => 'Userid',
        ];
    }

    /**
     * Gets query for [[Carts]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCarts()
    {
        return $this->hasMany(Cart::className(), ['userprofilesid' => 'id']);
    }

    /**
     * Gets query for [[Reservations]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getReservations()
    {
        return $this->hasMany(Reservation::className(), ['userprofilesid' => 'id']);
    }

    /**
     * Gets query for [[Reviews]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getReviews()
    {
        return $this->hasMany(Review::className(), ['userprofilesid' => 'id']);
    }

    /**
     * Gets query for [[Sales]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSales()
    {
        return $this->hasMany(Sale::className(), ['userprofilesid' => 'id']);
    }

    /**
     * Gets query for [[SalesStates]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSalesStates()
    {
        return $this->hasMany(SalesState::className(), ['userprofilesid' => 'id']);
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'userid']);
    }

    /**
     * Gets query for [[Userschedulesregistries]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUserschedulesregistries()
    {
        return $this->hasMany(Userschedulesregistry::className(), ['userprofilesid' => 'id']);
    }

    public function signup()
    {
        if (!$this->validate()) {
            return null;
        }
        var_dump($this);
        die();


    }

}
