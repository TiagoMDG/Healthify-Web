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

    <?= $form->field($model, 'reservedtime')->dropDownList([ '12:00' => '12:00', '12:30' => '12:30',
        '13:00' => '13:00', '13:30' => '13:30', '14:00' => '14:00', '14:30' => '14:30', '18:00' => '18:00',
        '18:30' => '18:30', '19:00' => '19:00', '19:30' => '19:30', '20:00' => '20:00', '20:30' => '20:30',
        '21:00' => '21:00', '21:30' => '21:30', '22:00' => '22:00', '22:30' => '22:30', ], ['prompt' => 'Select...'])->label('Time of Reservation') ?>

    <?= $form->field($model, 'userprofilesid')->dropDownList($listUsers, ['prompt' => 'Select...'])->label('Client'); ?>

    <?= $form->field($model, 'tableid')->dropDownList($listTables, ['prompt' => 'Select...'])->label('Table'); ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
