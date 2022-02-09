<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ReservationsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

?>

<?= GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'columns' => [

        //'id',
        'salesday',
        'precototal',
        'discount',
        //'paidamount',
        'paymentmethod',
        'paymentstate',
        'userprofilesid',

        [
            'class' => 'yii\grid\ActionColumn',
            'template' => '{update}',
            'buttons' => [
                'update' => function ($url, $model) {
                    return Html::a('Pagar', ['update', 'id' => $model->id], [
                        'class' => 'btn btn-success',
                    ]);
                }
            ]
        ],
    ],
]);

?>



