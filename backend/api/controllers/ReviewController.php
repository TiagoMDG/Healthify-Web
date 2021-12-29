<?php

namespace backend\api\controllers;

use backend\api\models\Reviews;
use yii\helpers\Json;
use yii\rest\ActiveController;

class ReviewController extends ActiveController
{
    public $modelClass ='backend\api\models\Reviews';

    //quando é inserida uma review é usado messaging para difundir para todos os clientes a review efetuada
    public function afterSave($insert, $changedAttributes)
    {
        parent::afterSave($insert, $changedAttributes);
        $id = $this->id;
        $rating = $this->rating;
        $review = $this->review;

        $myObj=new \stdClass();
        $myObj->id=$id;
        $myObj->rating=$rating;
        $myObj->review=$review;

        $myJson = Json::encode($myObj);

        $this->FazPublishNoMosquitto("review",$myJson);
    }

    public function actionFromuser($id){
        $reviews =Reviews::find()->where(['userid'=>$id])->all();
        if($reviews==null)
            $jsonResponse= 'Sem Reviews';
        else
            $jsonResponse =$reviews;

        return Json::encode($jsonResponse);
    }

    public function FazPublishNoMosquitto($canal,$msg)
    {
        $server = "127.0.0.1";
        $port = 1883;
        $username = ""; // set your username
        $password = ""; // set your password
        $client_id = "phpMQTT-publisher"; // unique!
        $mqtt = new \backend\api\phpMQTT($server, $port, $client_id);
        if ($mqtt->connect(true, NULL, $username, $password))
        {
            $mqtt->publish($canal, $msg, 0);
            $mqtt->close();
        }
        else { file_put_contents("debug.output","Time out!"); }
    }
}