<?php

namespace backend\api\controllers;
use app\api\models\User;
use yii\rest\ActiveController;

class UserController extends ActiveController
{
    public function actions()//desativa todas as funçoes desnecessarias
    {
        $action= parent::actions();
        unset($action['create']);
        return $action;
    }

    public $modelClass = 'app\api\models\User';

    public function actionCheck($id){

        $userCheck = User::findOne(['id'=>$id]);
        $roleCheck = $userCheck->getRole($userCheck->id);
        if ($roleCheck->item_name == "client")
            return true;
        else
            return false;
    }
}