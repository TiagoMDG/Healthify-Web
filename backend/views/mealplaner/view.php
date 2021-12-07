<?php

use yii\grid\GridView;
use yii\helpers\Html;
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
                Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                Lorem Ipsum has been the industry's standard dummy text ever since the 1500s when a
                n unknown printer took a galley of type and scrambled it to make a type specimen book.
                It has survived not only five centuries, but also the leap into electronic typesetting,
                remaining essentially unchanged. It was popularised in the 1960s with the release of
                Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing
                software like Aldus PageMaker including versions of Lorem Ipsum. It is a long
                established fact that a reader will be distracted by the readable content of a page
                when looking at its layout. The point of using Lorem Ipsum is that it has a
                more-or-less normal distribution of letters, as opposed to using 'Content here,
                content here', making it look like readable English. Many desktop publishing packages
                and web page editors now use Lorem Ipsum as their default model text, and a search
                for 'lorem ipsum' will uncover many web sites still in their infancy.
                Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                Lorem Ipsum has been the industry's standard dummy text ever since the 1500s when a
                n unknown printer took a galley of type and scrambled it to make a type specimen book.
                It has survived not only five centuries, but also the leap into electronic typesetting,
                remaining essentially unchanged. It was popularised in the 1960s with the release of
                Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing
                software like Aldus PageMaker including versions of Lorem Ipsum. It is a long
                established fact that a reader will be distracted by the readable content of a page
                when looking at its layout. The point of using Lorem Ipsum is that it has a
                more-or-less normal distribution of letters, as opposed to using 'Content here,
                content here', making it look like readable English. Many desktop publishing packages
                and web page editors now use Lorem Ipsum as their default model text, and a search
                for 'lorem ipsum' will uncover many web sites still in their infancy.
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
