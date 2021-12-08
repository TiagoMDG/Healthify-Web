<?php

use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
\yii\web\YiiAsset::register($this);
?>
<table class="mealplaner-view">
    <tr>
        <td class="col-lg-3">
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

        <td class="col-lg-7">
            <div class="" id="customScroll">
                <?php $serving = ActiveForm::begin(); ?>
                <table class="fc-widget-header">
                    <tr>
                        <th>serving_size_g</th><th>name</th><th>sugar_g</th><th>calories</th><th>protein_g</th>
                        <th>carbohydrates_total_g</th><th>fat_saturated_g</th><th>fat_total_g</th><th>fiber_g</th><th>cholesterol_mg</th>
                    </tr>
                    <?php foreach ($modelMealIngredients as $mealIngredient){ ?>
                        <tr>
                            <td><?= $serving->field($mealIngredient, 'serving_size_g')->textInput(['maxlength' => true]) ?></td><td><?=\backend\models\Ingredients::findOne($mealIngredient->ingredientsid)->name ?></td><td><?=$mealIngredient->total_sugar_g ?></td><td><?=$mealIngredient->total_calories ?></td><td><?=$mealIngredient->total_protein_g ?></td>
                            <td><?=$mealIngredient->total_carbohydrates_total_g ?></td><td><?=$mealIngredient->total_fat_saturated_g ?></td><td><?=$mealIngredient->total_fat_total_g ?></td><td><?=$mealIngredient->total_fiber_g ?></td><td><?=$mealIngredient->total_cholesterol_mg ?></td>
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
