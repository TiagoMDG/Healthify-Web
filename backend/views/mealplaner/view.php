<?php

use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use \backend\models\Ingredients;

/* @var $this yii\web\View */
\yii\web\YiiAsset::register($this);
?>
<table class="mealplaner-view">
    <tr>
        <td class="col-lg-7">
            <p>Ingredientes do prato</p>
            <div>
                <?php $serving = ActiveForm::begin(); ?>
                <table class="fc-widget-header">
                    <tr>
                        <th></th>
                        <th>Nome</th>
                        <th>Açucares</th>
                        <th>Calorias</th>
                        <th>Proteína</th>
                        <th>Hidratos de carbono</th>
                        <th>Lípidos (saturados)</th>
                        <th>Lípidos</th>
                        <th>Fibra</th>
                        <th>Colesterol (mg)</th>
                    </tr>
                    <?php foreach ($modelMealIngredients as $mealIngredient) { ?>
                        <tr>
                            <td><?= $serving->field($mealIngredient, 'serving_size_g')->textInput(['maxlength' => true]) ?></td>
                            <td><?= Ingredients::findOne($mealIngredient->ingredientsid)->name ?></td>
                            <td><?= $mealIngredient->total_sugar_g ?></td>
                            <td><?= $mealIngredient->total_calories ?></td>
                            <td><?= $mealIngredient->total_protein_g ?></td>
                            <td><?= $mealIngredient->total_carbohydrates_total_g ?></td>
                            <td><?= $mealIngredient->total_fat_saturated_g ?></td>
                            <td><?= $mealIngredient->total_fat_total_g ?></td>
                            <td><?= $mealIngredient->total_fiber_g ?></td>
                            <td><?= $mealIngredient->total_cholesterol_mg ?></td>
                        </tr>
                    <?php } ?>
                </table>
                <div class="form-group">
                    <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
                </div>
                <?php ActiveForm::end(); ?>
            </div>
        </td>
    </tr>

    <tr>
        <td class="col-lg-3">
            <p>Ingredientes a adicionar</p>
        </td>
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
            <button class="btn btn-success" id="idBtAddIngredientstoMeal"
                    onclick="addIngredientstoMeal(<?= $modelMeal->id ?>);">Adicionar Seleção
            </button>
        </div>
    </tr>
</table>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/jquery.pjax/2.0.1/jquery.pjax.min.js"></script>
<script type="text/javascript" src="../js/customJs.js"></script>
