<?php

namespace backend\api\controllers;

use app\api\models\Tables;
use yii\helpers\Json;
use yii\rest\ActiveController;

class TablesController extends ActiveController
{
    public $modelClass = 'app\api\models\Tables';

    public function actionOcupar($tableid)
    {
        $table = Tables::findOne($tableid);

        switch ($table->state) {
            case 'occupied':
                $jsonResponse = array('message' => 'Esta mesa está ocupada!');
                break;

            case 'reserved':
                $jsonResponse = array('message' => 'Esta mesa está reservada!');
                break;

            case 'free':
                $table->state = 'occupied';
                $table->save();
                $jsonResponse = array('message' => 'Ocupou esta mesa! Pode começar o seu pedido!');
        }

        return Json::encode($jsonResponse);
    }

    public function actionReservar($tableid)
    {
        $table = Tables::findOne($tableid);

        $table->state = 'reserved';
        $table->save();


        $jsonResponse = array('message' => 'Mesa reservada!');
        return Json::encode($jsonResponse);
    }

    public function actionLibertar($tableid)
    {
        $table = Tables::findOne($tableid);

        $table->state = 'free';
        $table->save();

        $jsonResponse = array('message' => 'Mesa libertada!');
        return Json::encode($jsonResponse);
    }
}