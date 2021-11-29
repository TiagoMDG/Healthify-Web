<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\MealsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="meals-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'totalcalories') ?>

    <?= $form->field($model, 'totalproteins') ?>

    <?= $form->field($model, 'totalcarbohidrates') ?>

    <?php // echo $form->field($model, 'totalfats') ?>

    <?php // echo $form->field($model, 'totalfibers') ?>

    <?php // echo $form->field($model, 'price') ?>

    <?php // echo $form->field($model, 'description') ?>

    <?php // echo $form->field($model, 'category') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
