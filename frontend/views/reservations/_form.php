<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Reservations */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="reservations-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'reservedday')->textInput() ?>

    <?= $form->field($model, 'reservedtime')->dropDownList([ 'almoco' => 'Almoco', 'jantar' => 'Jantar', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'userprofilesid')->hiddenInput(['value'=>$userid])->label(false) ?>

    <?= $form->field($model, 'tableid')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
