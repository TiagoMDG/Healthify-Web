<?php

use app\models\Meals;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */

$this->title = 'Preparação de pedidos';

?>
<div class="mealprep-index">

    <?php
    if ($mealsToPrep == null) { ?>
        <div>
            <h3>Sem novos pedidos</h3>
        </div>
    <?php } else { ?>
        <h3>Indicadores de estado</h3>
        <?php foreach ($mealsToPrep as $prep) { ?>
            <div>
                <h6><?= $prep->id ?></h6>
                <h6><?= Meals::nameByID($prep->mealid) ?></h6>

                <div class="inline">
                    <?= Html::a('Em Preparação', ['preparing', 'mealState' => 'preparing', 'mealId' => $prep->id], ['class' => 'btn btn-danger']) ?>
                    <?= Html::a('A Sair', ['deliver', 'mealState' => 'done', 'mealId' => $prep->id], ['class' => 'btn btn-success']) ?>
                </div>
            </div>
        <?php }
    } ?>


</div>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/jquery.pjax/2.0.1/jquery.pjax.min.js"></script>
<script type="text/javascript" src="../js/customJs.js"></script>