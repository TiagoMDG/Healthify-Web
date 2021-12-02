<?php

namespace backend\controllers;

use app\models\MealIngredients;
use app\models\MealIngredientsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * MealIngredientsController implements the CRUD actions for MealIngredients model.
 */
class MealIngredientsController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all MealIngredients models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new MealIngredientsSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single MealIngredients model.
     * @param int $mealsid Mealsid
     * @param int $ingredientsid Ingredientsid
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($mealsid, $ingredientsid)
    {
        return $this->render('view', [
            'model' => $this->findModel($mealsid, $ingredientsid),
        ]);
    }

    /**
     * Creates a new MealIngredients model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new MealIngredients();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'mealsid' => $model->mealsid, 'ingredientsid' => $model->ingredientsid]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing MealIngredients model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $mealsid Mealsid
     * @param int $ingredientsid Ingredientsid
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($mealsid, $ingredientsid)
    {
        $model = $this->findModel($mealsid, $ingredientsid);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'mealsid' => $model->mealsid, 'ingredientsid' => $model->ingredientsid]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing MealIngredients model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $mealsid Mealsid
     * @param int $ingredientsid Ingredientsid
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($mealsid, $ingredientsid)
    {
        $this->findModel($mealsid, $ingredientsid)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the MealIngredients model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $mealsid Mealsid
     * @param int $ingredientsid Ingredientsid
     * @return MealIngredients the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($mealsid, $ingredientsid)
    {
        if (($model = MealIngredients::findOne(['mealsid' => $mealsid, 'ingredientsid' => $ingredientsid])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
