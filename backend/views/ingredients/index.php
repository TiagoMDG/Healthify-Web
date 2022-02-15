<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\IngredientsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Ingredientes';
?>
<div class="ingredients-index">

    <p>
        <?= Html::a('Criar Ingrediente', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'sugar_g',
            'calories',
            'protein_g',
            'carbohydrates_total_g',
            'fat_saturated_g',
            'fat_total_g',
            'fiber_g',
            'cholesterol_mg',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
