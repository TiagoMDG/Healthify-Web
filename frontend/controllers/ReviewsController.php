<?php

namespace frontend\controllers;

use app\models\Reviews;
use app\models\ReviewsSearch;
use app\models\Userprofiles;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ReviewsController implements the CRUD actions for Reviews model.
 */
class ReviewsController extends Controller
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
     * Lists all Reviews models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $Reviews = Reviews::find()->all();

        return $this->render('index', [
            'reviews' => $Reviews,
        ]);
    }

    protected function findModel($id)
    {
        if (($model = Reviews::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
