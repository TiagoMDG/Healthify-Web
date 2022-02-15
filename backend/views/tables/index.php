<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TablesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Mesas';
?>
<div class="tables-index">

    <p>
        <?= Html::a('Criar Mesa', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'state',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
