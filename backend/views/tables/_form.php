<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Tables */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tables-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'state')->dropDownList([ 'occupied' => 'Occupied', 'free' => 'Free', 'reserved' => 'Reserved' ], ['prompt' => '']) ?>


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
