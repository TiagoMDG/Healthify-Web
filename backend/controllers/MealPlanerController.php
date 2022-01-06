<?php

namespace  backend\controllers;

use yii\debug\panels\EventPanel;
use yii\filters\AccessControl;
use yii\helpers\Console;
use yii\web\Controller;
use Yii;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

use backend\models\Ingredients;
use backend\models\IngredientsSearch;

use app\models\Meals;
use backend\models\MealsSearch;

use backend\models\Mealingredients;
use backend\models\MealingredientsSearch;

class MealplanerController extends Controller
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
                            'actions' => ['view', 'add'],
                            'allow' => true,
                            'roles' => ['admin', 'chef'],
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

    public function actionView($id)
    {
        $searchModel = new IngredientsSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('view', [
            'modelMeal' => Meals::findOne($id),
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'modelMealIngredients' => Mealingredients::find()->where(['mealsid' => $id])->all(),
        ]);
    }

    public function actionAdd($ingredientsIDs,$mealId){

        $response = null;

        $ingredientID=explode(",",$ingredientsIDs);

        foreach ($ingredientID as $id) {
            $ingredient = Ingredients::findOne($id);//bloco save caso nao haja o ingrediente adicionado
            $addIngredients = Mealingredients::find()->where(['ingredientsid' =>$id])->one();

            if ($addIngredients == null) {
                $newAddIngredients = new Mealingredients();
                $newAddIngredients->serving_size_g = 100;
                $newAddIngredients->total_sugar_g = $ingredient->sugar_g;
                $newAddIngredients->total_calories = $ingredient->calories;
                $newAddIngredients->total_protein_g = $ingredient->protein_g;
                $newAddIngredients->total_carbohydrates_total_g = $ingredient->carbohydrates_total_g;
                $newAddIngredients->total_fat_saturated_g = $ingredient->fat_saturated_g;
                $newAddIngredients->total_fat_total_g = $ingredient->fat_total_g;
                $newAddIngredients->total_fiber_g = $ingredient->fiber_g;
                $newAddIngredients->total_cholesterol_mg = $ingredient->cholesterol_mg;
                $newAddIngredients->mealsid = $mealId;
                $newAddIngredients->ingredientsid = $id;
                if (!$newAddIngredients->save(false)) {
                    $response = 'Erro ao guardar na base de dados ingrediente '.$ingredient->id." : ".$ingredient->name;
                }
            }//bloco save caso haja o ingrediente adicionado
            else {
                $response = "Ingrediente já inserido ".$ingredient->id." : ".$ingredient->name;
            }
        }
        return $response;
    }

}