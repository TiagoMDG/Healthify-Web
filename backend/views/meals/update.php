<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Meals */

$this->title = 'Update Meals: ' . $model->name;
?>
<div class="meals-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
