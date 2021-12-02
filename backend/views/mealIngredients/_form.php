<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\MealIngredients */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="meal-ingredients-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'mealsid')->textInput() ?>

    <?= $form->field($model, 'ingredientsid')->textInput() ?>

    <?= $form->field($model, 'ammout')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
