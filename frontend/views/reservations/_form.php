<?php

use yii\helpers\Html;
use yii\jui\DatePicker;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Reservations */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="reservations-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'reservedday')->widget(DatePicker::classname(), [
        'dateFormat' => 'yyyy-MM-dd',
        'options' => ['class' => 'form-control'],
    ]) ?>

    <?= $form->field($model, 'reservedtime')->dropDownList([ 'almoco' => 'Almoco', 'jantar' => 'Jantar', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'userprofilesid')->hiddenInput(['value'=>$userid])->label(false) ?>

    <?= $form->field($model, 'tableid')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
