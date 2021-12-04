<?php

namespace  backend\controllers;

use backend\models\Mealplaner;
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
    public function actionIndex(){
        return $this->render('index');
    }

    public function actionView($id)
    {
        $searchModel = new IngredientsSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('view', [
            'modelMeal' => Meals::findOne($id),
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionAdd($ingredientsIDs,$mealId){

        $addIngredients = new Mealingredients();

        $ingredient = Ingredients::findOne($ingredientsIDs);

        $addIngredients->serving_size_g=100;
        $addIngredients->total_sugar_g=$ingredient->sugar_g;
        $addIngredients->total_calories=$ingredient->calories;
        $addIngredients->total_protein_g=$ingredient->protein_g;
        $addIngredients->total_carbohydrates_total_g=$ingredient->carbohydrates_total_g;
        $addIngredients->total_fat_saturated_g=$ingredient->fat_saturated_g;
        $addIngredients->total_fat_total_g=$ingredient->fat_total_g;
        $addIngredients->total_fiber_g=$ingredient->fiber_g;
        $addIngredients->total_cholesterol_mg=$ingredient->cholesterol_mg;
        
        $addIngredients->mealsid=$mealId;
        $addIngredients->ingredientsid=$ingredientsIDs;

        $addIngredients->save(false);

    }

}