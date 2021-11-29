<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Meals */

$this->title = 'Create Meal';
$this->params['breadcrumbs'][] = ['label' => 'Meals', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="meals-create">

    <h1><?= Html::encode(ucfirst($category)) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'category' => $category
    ]) ?>

</div>
