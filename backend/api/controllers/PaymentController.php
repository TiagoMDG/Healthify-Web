<?php

namespace backend\api\controllers;

use backend\api\models\Cart;
use backend\api\models\Sales;
use backend\api\models\Userprofile;
use yii\db\Connection;
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

    public function actionPay($id, $card){
        $discount=0;
        if(validatecard($card)){
            $transaction =  (new Connection)->beginTransaction();
            try {
                $user = Userprofile::findOne(['userid' => $id]);
                $sale = Sales::findOne(['userprofilesid' => $user->getAttribute('id')]);
                $cartTotal = 0;
                $cart = Cart::findAll(["userprofilesid" => $id]);
                foreach ($cart as $value) {
                    $Totalvalue = $value->sellingprice * $value->itemquantity;
                    $cartTotal = $cartTotal + $Totalvalue;
                }
                $sale->precototal = $cartTotal;
                if ($discount == 0) {
                    $sale->paidamount = $sale->precototal;
                } else {
                    $sale->paidamount = $sale->precototal * ($discount / 100);
                    $sale->discount = ($discount / 100);
                }

                $sale->paymentmethod = "card";
                $sale->paymentstate = "paid";
                $sale->save();

                $transaction->commit();
            }catch (\Exception $e) {
                $transaction->rollBack();;
                throw $e;
            } catch (\Throwable $e) {
                $transaction->rollBack();
                throw $e;
            }
            $jsonResponse = array('success'=>true);
        }
        else
            $jsonResponse = array('success'=>false);

        return Json::encode($jsonResponse);
    }

}