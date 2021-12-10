<?php

use app\models\Category;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\MealsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Meals';
?>
<div class="meals-index">

    <h1><?= Html::encode(ucfirst($categoryname)) ?></h1>

    <p>
        <?= Html::a('Create Meal', ['create', 'categoryid' => $categoryid, 'categoryname' => $categoryname], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'price',
            'description',

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view} {update} {delete}',
                'buttons' => [
                    'delete' => function ($url, $model) {
                        return Html::a('<i class="fas fa-trash-alt"></i>', ['delete', 'id' => $model->id, 'categoryid' => $model->categoryid, 'categoryname' => Category::getCategoriaById($model->categoryid)->name], [
                            'class' => '',
                            'data' => [
                                'confirm' => 'Tem a certeza que deseja remover este prato? É impossivel desfazer esta ação.',
                                'method' => 'post',
                            ],
                        ]);
                    }
                ]
            ],
        ],
    ]); ?>


</div>
