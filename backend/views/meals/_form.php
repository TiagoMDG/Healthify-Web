<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Meals */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="meals-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'totalcalories')->textInput() ?>

    <?= $form->field($model, 'totalproteins')->textInput() ?>

    <?= $form->field($model, 'totalcarbohidrates')->textInput() ?>

    <?= $form->field($model, 'totalfats')->textInput() ?>

    <?= $form->field($model, 'totalfibers')->textInput() ?>

    <?= $form->field($model, 'price')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'category')->hiddenInput(['value'=>$category])->label(false); ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
