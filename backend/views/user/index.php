<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
$this->title = 'Utilizadores';
?>
<div class="user-index">

    <p>
        <?= Html::a('Criar Utilizador', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <table class="table">
        <thead>
        <th><h3>Id</h3></th>
        <th><h3>Name</h3></th>
        <th><h3>Role</h3></th>
        </thead>
        <?php foreach ($filterUsers as $user) { ?>
            <tr>

                <td><?= $user->id ?></td>
                <td><?= $user->username ?></td>
                <td><?= $user->getRole($user->id)->item_name ?></td>

                <td>
                    <?= Html::a('Editar Utilizador', ['update', 'id' => $user->id], ['class' => 'btn btn-primary']) ?>
                    <?= Html::a('Apagar', ['delete', 'id' => $user->id], ['class' => 'btn btn-danger', 'data' => [
                        'confirm' => 'Are you sure you want to delete this item?',
                        'method' => 'post',
                    ],]) ?>
                </td>
            </tr>
        <?php } ?>
    </table>


</div>
