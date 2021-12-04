<?php

use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
\yii\web\YiiAsset::register($this);
?>
<table class="mealplaner-view">
    <tr>
        <td>
            <div>
                <?= DetailView::widget([
                    'model' => $modelMeal,
                    'attributes' => [
                            'name',
                            'price',
                            'description',
                            'category',
                    ],
                ]) ?>
            </div>
        </td>

        <td>

        </td>
    </tr>

    <tr>
        <div id="grid">
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    [
                        'class' => 'yii\grid\CheckboxColumn',
                    ],
                    'name',
                    'sugar_g',
                    'calories',
                    'protein_g',
                    'carbohydrates_total_g',
                    'fat_saturated_g',
                    'fat_total_g',
                    'fiber_g',
                    'cholesterol_mg',
                ],
            ]); ?>
            <button class="btn btn-success" id="idBtAddIngredientstoMeal" onclick="addIngredientstoMeal(<?= $modelMeal->id ?>);">Adicionar Seleção</button>
        </div>
    </tr>
</table>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.pjax/2.0.1/jquery.pjax.min.js"></script>
<script type="text/javascript" src="../web/js/customJs.js"></script>
