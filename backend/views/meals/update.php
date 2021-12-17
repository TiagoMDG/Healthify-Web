<?php

use app\models\Category;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Meals */

//ID da categoria do prato
$categoryid = $model->categoryid;

//Nome da categoria com o ID
$categoryname = Category::getCategoriaById($categoryid)->name;

$this->title = 'Updating Meal';
$this->params['breadcrumbs'][] = ['label' => ucfirst($categoryname), 'url' => ['category', 'categoryid' => $categoryid, 'categoryname' => $categoryname]];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="meals-update">

    <h1><?= Html::encode($model->name) ?></h1>

    <?= $this->render('update_form', [
        'model' => $model,
    ]) ?>

</div>