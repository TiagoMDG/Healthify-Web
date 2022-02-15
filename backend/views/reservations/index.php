<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\jui\Tabs;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ReservationsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Reservas';
?>
<div class="reservations-index">


    <p>
        <?= Html::a('Criar Reserva', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?php

    echo Tabs::widget([
        'items' => [
            [
                'label' => 'Reservas Hoje',
                'url' => ['reservations/activereserves'],
            ],
            [
                'label' => 'Reservas Futuras',
                'url' => ['reservations/futurereserves'],
            ],
            [
                'label' => 'Reservas Passadas',
                'url' => ['reservations/pastreserves'],
            ],
        ],
        'options' => ['tag' => 'div'],
        'itemOptions' => ['tag' => 'div'],
        'headerOptions' => ['class' => 'my-class'],
        'clientOptions' => ['collapsible' => false],
    ]);

    ?>

</div>
