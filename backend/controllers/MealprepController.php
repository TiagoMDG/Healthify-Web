<?php

namespace  backend\controllers;

use app\models\SalesMeals;
use app\models\Sales;

class MealprepController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $mealsToPrep = SalesMeals::find()->where(['state'=>'waiting'])->andWhere(['state'=>'preparing'])->all();

        return $this->render('index',[
            'mealsToPrep'=> $mealsToPrep,
        ]);
    }

    public function actionPrep($mealState,$mealId)
    {
        $toAlter = SalesMeals::findOne($mealId);
        $toAlter->state=$mealState;
        $toAlter->save();
        return 200;
    }

    public function actionDone($mealState,$mealId)
    {
        $toAlter = SalesMeals::findOne($mealId);
        $toAlter->state=$mealState;
        $toAlter->save();
        return 200;
    }
}
