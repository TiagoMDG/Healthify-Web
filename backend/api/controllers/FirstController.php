<?php

namespace backend\api\controllers;

use app\api\models\User;
use backend\api\models\UserCreateForm;
use Yii;
use yii\helpers\Json;
use yii\rest\Controller;

//classe controla  os acessos dos utilizadores ás areas restritas do site e contas dos mesmos

class FirstController extends Controller
{
    public $modelClass = 'common\models\User';

    public function getPost(){
        return Yii::$app->request->post();
    }

    public function actionLogin(){
        $jsonPost = $this->getPost();

        if($jsonPost !== null&&$jsonPost['email']&&$jsonPost['password']){

            if (User::find()->where(["email"=>$jsonPost['email']])->one()){
                $user=User::find()->where(["email"=>$jsonPost['email']])->one();
                $hash = User::findByUsername($user->getAttribute("username"));

                if (Yii::$app->getSecurity()->validatePassword($jsonPost['password'], $hash->password_hash)) {
                    $jsonResponse = array('success'=>true,'token'=>User::findByUsername($user->getAttribute("username"))->getAuthKey());
                } else {
                    $jsonResponse = "Login Failed";
                }
            }
        }else{
            $jsonResponse = "Login Failed";
            // do your query stuff here
        }
        return Json::encode($jsonResponse);
    }

    public function actionRegister(){
        $jsonPost = $this->getPost();
        if (User::findByUsername($jsonPost['username'])==null&&User::find()->where(['email'=>$jsonPost['email']])->one()==null) {
            $modelNewUser = new UserCreateForm();
            $modelNewUser->username = $jsonPost['username'];
            $modelNewUser->email = $jsonPost['email'];
            $modelNewUser->password = $jsonPost['password'];

            $modelNewUser->signup();
            $user = User::findByUsername($jsonPost['username']);
            $jsonResponse =  array('success'=>true ,'id'=>$user->id ,'username'=>$user->username ,'email'=>$user->email);
        }else
            $jsonResponse = array('message'=>'failed');

        return  Json::encode($jsonResponse);
    }

    public function actionLogout(){
        Yii::$app->user->logout();

        return  array('success'=>true,'status'=>'true');
    }

    public function actionDelete(){
        $jsonPost = $this->getPost();

        return  Json::encode(User::findOne(['id'=>$jsonPost['id']])->delete());
    }


}