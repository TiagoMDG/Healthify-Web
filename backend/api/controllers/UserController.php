<?php

namespace backend\api\controllers;
use yii\rest\ActiveController;

class UserController extends ActiveController
{
    public $modelClass = 'app\api\models\User';

}