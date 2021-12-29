<?php

namespace backend\api\controllers;

use backend\api\models\Sales;
use backend\api\models\Userprofile;
use yii\helpers\Json;
use yii\rest\ActiveController;

function validatecard($number)
    {
        global $type;

        $cardtype = array(
            "visa"       => "/^4[0-9]{12}(?:[0-9]{3})?$/",
            "mastercard" => "/^5[1-5][0-9]{14}$/",
            "amex"       => "/^3[47][0-9]{13}$/",
            "discover"   => "/^6(?:011|5[0-9]{2})[0-9]{12}$/",
        );

        if (preg_match($cardtype['visa'],$number))
        {
            $type= "visa";
            return true;

        }
        else if (preg_match($cardtype['mastercard'],$number))
        {
            $type= "mastercard";
            return true;
        }
        else if (preg_match($cardtype['amex'],$number))
        {
            $type= "amex";
            return true;

        }
        else if (preg_match($cardtype['discover'],$number))
        {
            $type= "discover";
            return true;
        }
        else
        {
            return false;
        }
    }

class PaymentController extends ActiveController
{
    public $modelClass = 'backend\api\models\Userprofile';

    public function actionPay($id,$card){
        if(validatecard($card)){
            $jsonResponse = array('success'=>true);
            $user = Userprofile::findOne(['userid'=>$id]);

            $sale = Sales::findOne(['userprofilesid'=>$user->getAttribute('id')]);
            $sale->paymentstate = "paid";
            $sale->save();
        }

        else
            $jsonResponse = array('success'=>false);

        return Json::encode($jsonResponse);
    }

}