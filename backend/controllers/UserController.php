<?php

namespace backend\controllers;


use app\models\AuthAssignment;
use app\models\User;
use backend\models\UserCreateForm;
use Yii;
use yii\web\Controller;
use yii\web\HttpException;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;


/**
 * UserController implements the CRUD actions for User model.
 */
class UserController extends Controller
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
     * Lists all User models.
     * @return mixed
     */
    /**
     * $searchModel = new UserSearch();
     * $dataProvider = $searchModel->search($this->request->queryParams);
     *
     * return $this->render('index', [
     * 'searchModel' => $searchModel,
     * 'dataProvider' => $dataProvider,
     * ]);
     **/

    public function actionIndex()
    {
        $allUsers = User::find()
            ->indexBy('id')
            ->all();

        foreach ($allUsers as $user) {
            if ($user->username != 'admin') {
                $filterUsers[] = $user;
            }}

            return $this->render('index', [
                'filterUsers' => $filterUsers,
            ]);
        }

        /**
         * Displays a single User model.
         * @param int $id ID
         * @return mixed
         * @throws NotFoundHttpException if the model cannot be found
         */
        public
        function actionView($id)
        {
            return $this->render('view', [
                'model' => $this->findModel($id),
            ]);
        }

        /**
         * Creates a new User model.
         * If creation is successful, the browser will be redirected to the 'view' page.
         * @return mixed
         */
        public
        function actionCreate()
        {
            $model = new UserCreateForm();
            if ($model->load(Yii::$app->request->post()) && $model->signup()) {
                Yii::$app->session->setFlash('success', 'Thank you for registration. Please check your inbox for verification email.');
                return $this->goHome();
            }

            return $this->render('create', [
                'model' => $model,
            ]);
        }

        /**
         * Updates an existing User model.
         * If update is successful, the browser will be redirected to the 'view' page.
         * @param int $id ID
         * @return mixed
         * @throws NotFoundHttpException if the model cannot be found
         */
        public
        function actionUpdate($id)
        {
            $model = $this->findModel($id);
            $role = $model->getRole($model->id);
            $modelAuth=AuthAssignment::find()->all();

            if ($this->request->isPost && $model->save() && $model->load($this->request->post()) && $model->save()) {

                $redefinedRole = Yii::$app->request->post();

                if($redefinedRole['AuthAssignment']['item_name']!='chef'&& $redefinedRole['AuthAssignment']['item_name']!='staff'
                    && $redefinedRole['AuthAssignment']['item_name']!='client')
                    throw new HttpException(403, 'Tentativa de alteração para um role indefinido ');

                $auth = Yii::$app->authManager;
                Yii::$app->authManager->revokeAll($model->id);
                $authRole = $auth->getRole($redefinedRole['AuthAssignment']['item_name']);
                $auth->assign($authRole, $model->id);
                return $this->redirect(['index']);
            }

            return $this->render('update', [
                'model' => $model,
                'modelAuth' =>$modelAuth,
                'role' => $role,
            ]);
        }

        /**
         * Deletes an existing User model.
         * If deletion is successful, the browser will be redirected to the 'index' page.
         * @param int $id ID
         * @return mixed
         * @throws NotFoundHttpException if the model cannot be found
         */
        public
        function actionDelete($id)
        {
            Yii::$app->authManager->revokeAll($this->findModel($id)->id);
            $this->findModel($id)->delete();
            return $this->redirect(['index']);
        }

        /**
         * Finds the User model based on its primary key value.
         * If the model is not found, a 404 HTTP exception will be thrown.
         * @param int $id ID
         * @return User the loaded model
         * @throws NotFoundHttpException if the model cannot be found
         */
        protected
        function findModel($id)
        {
            if (($model = User::findOne($id)) !== null) {
                return $model;
            }

            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
