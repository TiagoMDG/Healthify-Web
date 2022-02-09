<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\jui\Tabs;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SalesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Sales';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sales-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Sales', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?php

    echo Tabs::widget([
        'items' => [
            [
                'label' => 'Pedidos Por Pagar',
                'url' => ['sales/pagamento'],
            ],
            [
                'label' => 'Histórico de Pedidos',
                'url' => ['sales/historico'],
            ],
        ],
        'options' => ['tag' => 'div'],
        'itemOptions' => ['tag' => 'div'],
        'headerOptions' => ['class' => 'my-class'],
        'clientOptions' => ['collapsible' => false],
    ]);

    ?>

</div>
