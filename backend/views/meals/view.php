<?php

use app\models\Category;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Meals */

//ID da categoria do prato
$categoryid = $model->categoryid;

//Nome da categoria a partir do ID
$categoryname = Category::getCategoriaById($categoryid)->name;

$id = $model->id;

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => ucfirst($categoryname), 'url' => ['category', 'categoryid' => $categoryid, 'categoryname' => $categoryname]];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);

?>
<div class="meals-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Adicionar Ingredientes', ['mealplaner/view', 'id' => $id], ['class' => 'btn btn-success']) ?>

        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>

        <?= Html::a('Delete', ['delete', 'id' => $model->id, 'categoryid' => $categoryid, 'categoryname' => $categoryname], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'price',
            'description',
            //'categoryid',
        ],
    ]) ?>

    <p>
        <?= Html::a('Back to index', ['category', 'categoryid' => $categoryid, 'categoryname' => $categoryname], ['class' => 'btn btn-primary']) ?>
    </p>

</div>