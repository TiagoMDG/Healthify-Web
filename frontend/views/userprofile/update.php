<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Userprofile */

$this->title = 'Atualizar Conta: ' . $model->name;
?>
<div class="userprofile-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'userid' => $userid,
        'username'=>$username,
    ]) ?>

</div>
