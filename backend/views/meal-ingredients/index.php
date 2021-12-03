<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\MealIngredientsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Meal Ingredients';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="meal-ingredients-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Meal Ingredients', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'mealsid',
            'ingredientsid',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
