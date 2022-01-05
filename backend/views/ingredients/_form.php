<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Ingredients */
/* @var $form yii\widgets\ActiveForm */
?>

<table>
    <tr>
        <th>
            <div>
                <h3>Pesquisa de Ingredientes</h3>
                <form>
                    <label for="idPesquisa"></label><input type="text" name="Pesquisa" id="idPesquisa" placeholder="Pesquisa..">
                </form>
                <button class="btn-pesquisa icon" id="idBtSearch" onclick="pesquisa();"><img src="../web/img/search.svg"></button>
            </div>
        </th>
        <th>
            <div class="ingredients-form col-lg-9">

                <?php $form = ActiveForm::begin(); ?>

                <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
            <table id="tableIngredients">
                <th>
                    <div>
                        <?= $form->field($model, 'sugar_g')->textInput() ?>

                        <?= $form->field($model, 'calories')->textInput() ?>

                        <?= $form->field($model, 'protein_g')->textInput() ?>

                        <?= $form->field($model, 'carbohydrates_total_g')->textInput() ?>
                    </div>
                </th>
                <th>
                    <div>
                        <?= $form->field($model, 'fat_saturated_g')->textInput() ?>

                        <?= $form->field($model, 'fat_total_g')->textInput() ?>

                        <?= $form->field($model, 'fiber_g')->textInput() ?>

                        <?= $form->field($model, 'cholesterol_mg')->textInput() ?>
                    </div>
                </th>
            </table>
        <div class="form-group">
            <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
        </div>

        <?php ActiveForm::end(); ?>
    </div>
        </th>
    </tr>
</table>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.pjax/2.0.1/jquery.pjax.min.js"></script>
<script type="text/javascript" src="../web/js/customJs.js"></script>