<?php

namespace backend\api\controllers;

use Yii;
use yii\helpers\Json;
use yii\rest\Controller;
use common\models\User;

class FirstController extends Controller
{
    public $modelClass = 'common\models\User';

    public function actionLogin(){
        $jsonPost = Yii::$app->request->post();

        if($jsonPost !== null&&$jsonPost['username']&&$jsonPost['password']){

            if (User::findByUsername($jsonPost['username'])){
                $hash = User::findByUsername($jsonPost['username']);

                if (Yii::$app->getSecurity()->validatePassword($jsonPost['password'], $hash->password_hash)) {
                    $jsonResponse = array('token'=>User::findByUsername($jsonPost['username'])->getAuthKey());
                } else {
                    $jsonResponse = "Login Failed, Wrong Password";
                }
            }
        }else{
            $jsonResponse = "Login Failed";
            // do your query stuff here
        }
        return Json::encode($jsonResponse);
    }

    public function actionLogout(){
        return  Yii::$app->user->logout();
    }


    /*public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['authenticator'] = [
            'class' => HttpBasicAuth::className(),
            'auth' => [$this, 'auth']
        ];
        return $behaviors;
    }

    public function auth($username, $password)
    {
        $user = User::findByUsername($username);
        if ($user && $user->validatePassword($password))
        {
            return $user->getId();
        }
    }*/
}