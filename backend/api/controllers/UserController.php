<?php

namespace backend\api\controllers;
use common\models\User;
use yii\rest\ActiveController;

class UserController extends ActiveController
{
    public $modelClass = 'common\models\User';

}