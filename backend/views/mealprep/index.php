<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */

$this->title = 'Preparação de pedidos';

?>
<div class="mealprep-index">

    <?php
    if($mealsToPrep==null) {?>
        <div>
            <h3>Sem novos pedidos</h3>
        </div>
    <?php }else{ ?>
        <h3>Indicadores de estado</h3>
        <?php foreach ($mealsToPrep as $prep){?>
        <div>
            <h6><?= $prep->getMeal()->name ?></h6>
            <div class="inline">
                <button id="btnPrep" class="btn btn-danger" onclick="mealPrep(1);">Em Preparação</button><button class="btn btn-success" onclick="mealDone(1);">A Entregar</button>
            </div>
        </div>
    <?php }
    } ?>


</div>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/jquery.pjax/2.0.1/jquery.pjax.min.js"></script>
<script type="text/javascript" src="../js/customJs.js"></script>