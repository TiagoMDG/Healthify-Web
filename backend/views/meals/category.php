<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\MealsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Meals';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="meals-index">

    <h1><?= Html::encode(ucfirst($meal)) ?></h1>

    <p>
        <?= Html::a('Create Meal', ['create', 'category'=>$meal], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'totalcalories',
            'totalproteins',
            'totalcarbohidrates',
            'totalfats',
            'totalfibers',
            'price',
            'description',
            //'category',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
