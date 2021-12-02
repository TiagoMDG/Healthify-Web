<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\MealIngredients */

$this->title = 'Update Meal Ingredients: ' . $model->mealsid;
$this->params['breadcrumbs'][] = ['label' => 'Meal Ingredients', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->mealsid, 'url' => ['view', 'mealsid' => $model->mealsid, 'ingredientsid' => $model->ingredientsid]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="meal-ingredients-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
