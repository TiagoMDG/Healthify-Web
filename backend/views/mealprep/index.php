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

        <?php foreach ($tables as $table) { ?>

            <div class="column">

            <h1>Mesa <?= $table->id; ?></h1>
            <?php foreach ($mealsToPrep as $prep) { ?>
                <?php if ($prep->mesa == $table->id) { ?>

                    <div class="row">
                        <div class="card">
                            <h4><b><?= Meals::nameByID($prep->mealid) ?></b></h4>

                            <?php if ($prep->state == 'waiting') { ?>
                                <?= Html::a('Em Preparação', ['preparing', 'mealState' => 'preparing', 'mealId' => $prep->id], ['class' => 'btn btn-danger']) ?>
                            <?php } else { ?>
                                <?= Html::a('A Sair', ['deliver', 'mealState' => 'done', 'mealId' => $prep->id], ['class' => 'btn btn-success']) ?>
                            <?php } ?>

                        </div>
                    </div>
                <?php }
            } ?>
            </div>
       <?php } ?>
    <?php } ?>

    <div class="column">

        <h1>Takeaway</h1>
        <?php foreach ($mealsToPrep as $prep) { ?>
            <?php if ($prep->mesa == 'takeaway') { ?>

                <div class="row">
                    <div class="card">
                        <h4><b><?= Meals::nameByID($prep->mealid) ?></b></h4>

                        <?php if ($prep->state == 'waiting') { ?>
                            <?= Html::a('Em Preparação', ['preparing', 'mealState' => 'preparing', 'mealId' => $prep->id], ['class' => 'btn btn-danger']) ?>
                        <?php } else { ?>
                            <?= Html::a('A Sair', ['deliver', 'mealState' => 'done', 'mealId' => $prep->id], ['class' => 'btn btn-success']) ?>
                        <?php } ?>

                    </div>
                </div>
            <?php }
        } ?>
    </div>

</div>
</div>

<script>
    function timedRefresh(timeoutPeriod) {
        setTimeout("location.reload(true);", timeoutPeriod);
    }

    window.onload = timedRefresh(30000);
    window.onload = refresh();
</script>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/jquery.pjax/2.0.1/jquery.pjax.min.js"></script>
<script type="text/javascript" src="../js/customJs.js"></script>