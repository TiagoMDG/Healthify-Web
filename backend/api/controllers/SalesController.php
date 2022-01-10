<?php

namespace backend\api\controllers;

use backend\api\models\Sales;
use yii\helpers\Json;
use yii\rest\ActiveController;

class SalesController extends ActiveController
{
    public function actions()//desativa todas as funçoes desnecessarias
    {
        $action = parent::actions();
        unset($action['create']);
        unset($action['update']);
        unset($action['delete']);
        return $action;
    }

    public $modelClass = 'backend\api\models\sales';

    public function actionSold($id)
    {
        return Json::encode(Sales::findAll(['userprofilesid'=>$id]));
    }

}