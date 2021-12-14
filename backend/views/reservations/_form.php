<?php

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\jui\DatePicker;
use yii\widgets\ActiveForm;
use app\models\User;
use app\models\Tables;

/* @var $this yii\web\View */
/* @var $model app\models\Reservations */
/* @var $form yii\widgets\ActiveForm */

$user = User::find()->all();
$listUsers = ArrayHelper::map($user, 'id', 'username');

$tables = Tables::find()->all();
$listTables = ArrayHelper::map($tables, 'id', 'id');

?>

<div class="reservations-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php echo $form->errorSummary($model, ['header' => 'ERROR']); ?>

    <?= $form->field($model, 'reservedday')->widget(DatePicker::classname(), [
        'dateFormat' => 'yyyy-MM-dd',
        'options' => ['class' => 'form-control'],
    ])->label('Reserve Day') ?>

    <?= $form->field($model, 'reservedtime')->dropDownList([ 'almoco' => 'Almoço', 'jantar' => 'Jantar', ], ['prompt' => 'Select...'])->label('Time of Reservation') ?>

    <?= $form->field($model, 'userprofilesid')->dropDownList($listUsers, ['prompt' => 'Select...'])->label('Client'); ?>

    <?= $form->field($model, 'tableid')->dropDownList($listTables, ['prompt' => 'Select...'])->label('Table'); ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
