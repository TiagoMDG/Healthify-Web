<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\jui\Tabs;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ReservationsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $userid */

$this->title = 'Reservations';
?>
<div class="reservations-index">


    <p>
        <?= Html::a('Create Reservations', ['create', 'userid' => $userid], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?php

    echo Tabs::widget([
        'items' => [
            [
                'label' => 'As suas Reservas',
                'url' => ['reservations/activereserves', 'userid' => $userid],
            ],
            [
                'label' => 'Histórico de Reservas',
                'url' => ['reservations/pastreserves', 'userid' => $userid],
            ],
        ],
        'options' => ['tag' => 'div'],
        'itemOptions' => ['tag' => 'div'],
        'headerOptions' => ['class' => 'my-class'],
        'clientOptions' => ['collapsible' => false],
    ]);

    ?>

</div>

