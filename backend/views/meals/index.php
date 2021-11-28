<?php

use hail812\adminlte3\widgets\Alert;
use hail812\adminlte3\widgets\Callout;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\MealsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Meals';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="container-fluid">

    <?php for ($row = 0; $row < 7; $row++) { ?>

            <div class="col-md-3 col-sm-6 col-12">
                <!-- small box -->
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3><?php echo(ucfirst($mealCount[$row][0]));?><sup style="font-size: 20px"></sup></h3>
                        <p><?php echo($mealCount[$row][1])?> Total</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                    </div>
                    <?= Html::a('More Info <i class="fas fa-arrow-circle-right"></i>', ['meals/category', 'meal' => $mealCount[$row][0]], ['data-method' => 'post', 'class' => 'small-box-footer']) ?>
                </div>
            </div>

        <?php } ?>

</div>
