<?php

namespace backend\controllers;

use app\models\SalesMeals;
use app\models\Sales;
use app\models\Tables;
use backend\models\Mealingredients;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;

class MealprepController extends \yii\web\Controller
{
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'access' => [
                    'class' => AccessControl::class,
                    'rules' => [
                        [
                            'actions' => ['login', 'error'],
                            'allow' => true,
                        ],
                        [
                            'actions' => ['index', 'preparing', 'deliver'],
                            'allow' => true,
                            'roles' => ['admin', 'chef', 'staff'],
                        ],
                        [
                            'actions' => ['logout'],
                            'allow' => true,
                            'roles' => ['@'],
                        ],
                    ],
                ],
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    public function actionIndex()
    {
        $mealsToPrep = SalesMeals::find()->where(['not', ['state' => 'done']])->all();
        $tables = Tables::find()->all();
        $mealIngredients = Mealingredients::find()->all();

        return $this->render('index', [
            'mealsToPrep' => $mealsToPrep,
            'tables'=> $tables,
            'mealIngredients' => $mealIngredients,
        ]);
    }

    public function actionPreparing($mealState, $mealId)
    {
        $mealsToPrep = SalesMeals::find()->where(['not', ['state' => 'done']])->all();
        $tables = Tables::find()->all();
        $mealIngredients = Mealingredients::find()->all();

        $toAlter = SalesMeals::findOne($mealId);
        $toAlter->state = $mealState;
        $toAlter->save();

        return $this->render('index', [
            'mealsToPrep' => $mealsToPrep,
            'tables'=> $tables,
            'mealIngredients' => $mealIngredients,
        ]);
    }

    public function actionDeliver($mealState, $mealId)
    {
        $mealsToPrep = SalesMeals::find()->where(['not', ['state' => 'done']])->all();
        $tables = Tables::find()->all();
        $mealIngredients = Mealingredients::find()->all();

        $toAlter = SalesMeals::findOne($mealId);
        $toAlter->state = $mealState;
        $toAlter->save();

        return $this->render('index', [
            'mealsToPrep' => $mealsToPrep,
            'tables'=> $tables,
            'mealIngredients' => $mealIngredients,
        ]);
    }
}
