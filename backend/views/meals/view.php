<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Meals */

$this->title = $model->name;
\yii\web\YiiAsset::register($this);
?>
<div class="meals-view">

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'price',
            'description',
            'category',
        ],
    ]) ?>

</div>
<p>
    <?= Html::a('Adicionar Ingredientes', ['mealplaner/view', 'id' => $model->id], ['class' => 'btn btn-success']) ?>
    <?= Html::a('Atualizar', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
    <?= Html::a('Apagar', ['delete', 'id' => $model->id], [
        'class' => 'btn btn-danger',
        'data' => [
            'confirm' => 'Are you sure you want to delete this item?',
            'method' => 'post',
        ],
    ]) ?>
</p>
