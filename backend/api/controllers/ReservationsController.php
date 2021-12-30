<?php

namespace backend\api\controllers;

use app\models\Reservations;
use yii\helpers\Json;
use yii\rest\ActiveController;

class ReservationsController extends ActiveController
{
    public $modelClass = 'app\models\Reservations';

    public function actionGetreservations($id)
    {
        $reservations = Reservations::findAll(['userprofilesid' => $id]);

        return Json::encode($reservations);
    }

    public function actionReservar($userprofilesid, $tableid, $reservedday, $reservedtime)
    {
        $modelClass = new Reservations();
        $modelClass->reservedday = $reservedday;
        $modelClass->reservedtime = $reservedtime;
        $modelClass->tableid = $tableid;
        $modelClass->userprofilesid = $userprofilesid;

        if (Reservations::find()->where(['userprofilesid' => $modelClass->userprofilesid])->andWhere(['reservedday' => $modelClass->reservedday])->exists()) {
            $jsonResponse = array('message' => 'This client already has a reservation today!');
            return Json::encode($jsonResponse);
        } else if (Reservations::find()->where(['tableid' => $modelClass->tableid])->andWhere(['reservedday' => $modelClass->reservedday])->andWhere(['reservedtime' => $modelClass->reservedtime])->exists()) {
            $jsonResponse = array('message' => 'This table is already booked!');
            return Json::encode($jsonResponse);
        } else {
            $modelClass->save();
            $jsonResponse = array('success' => true);
        }

        return Json::encode($jsonResponse);
    }
}