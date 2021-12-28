<?php

namespace backend\controllers;

use app\models\Reservations;
use app\models\ReservationsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ReservationsController implements the CRUD actions for Reservations model.
 */
class ReservationsController extends Controller
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
     * Lists all Reservations models.
     * @return mixed
     */
    public function actionIndex()
    {
        return $this->render('index', [
        ]);
    }

    public function actionActivereserves()
    {
        $searchModel = new ReservationsSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        $dataProvider->query->Where(['reservedday' => date("Y/m/d")]);

        $this->layout = false;


        return $this->render('reserves', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionPastreserves()
    {
        $searchModel = new ReservationsSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        //$dataProvider->query->Where(['reservedday' != date("Y/m/d")]);
        $dataProvider->query->andFilterCompare ( 'reservedday', date("Y/m/d"), '<' );

        $this->layout = false;

        return $this->render('reserves', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionFuturereserves()
    {
        $searchModel = new ReservationsSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        //$dataProvider->query->Where(['reservedday' != date("Y/m/d")]);
        $dataProvider->query->andFilterCompare ( 'reservedday', date("Y/m/d"), '>' );

        $this->layout = false;

        return $this->render('reserves', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Reservations model.
     * @param int $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Reservations model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Reservations();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->validate()) {
                if (Reservations::find()->where(['userprofilesid' => $model->userprofilesid])->andWhere(['reservedday' => $model->reservedday])->exists()) {
                    $model->addError('', 'This client already has a reservation today!');
                } else if (Reservations::find()->where(['tableid' => $model->tableid])->andWhere(['reservedday' => $model->reservedday])->andWhere(['reservedtime' => $model->reservedtime])->exists()) {
                    $model->addError('', 'This table is already booked!');
                } else {
                    $model->save();
                    return $this->redirect(['view', 'id' => $model->id]);
                }
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Reservations model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Reservations model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Reservations model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Reservations the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Reservations::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
