<?php

use hail812\adminlte3\widgets\Alert;
use hail812\adminlte3\widgets\Callout;
use hail812\adminlte3\widgets\SmallBox;
use yii\helpers\Html;

$this->title = 'Zona Administrativa';
$this->params['breadcrumbs'] = [['label' => $this->title]];
?>
<div class="container-fluid">

    <div class="col-md-3 col-sm-6 col-12">
            <!-- small box -->
            <div class="small-box bg-success">
                <div class="inner">
                    <h3><?php echo($numCategorias) ?><sup style="font-size: 20px"></sup></h3>

                    <p>Número de Categorias existentes</p>
                </div>
                <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                </div>

                <?= Html::a('More Info <i class="fas fa-arrow-circle-right"></i>', ['category/index'], ['data-method' => 'post', 'class' => 'small-box-footer']) ?>

            </div>
    </div>
    <!-- Custom tabs (Charts with tabs)-->

    <div class="info-box bg-info">
        <span class="info-box-icon"><i class="far fa-bookmark"></i></span>
        <div class="info-box-content">
            <span class="info-box-text">Bookmarks</span>
            <span class="info-box-number">41,410</span>
        </div>
        <!-- /.info-box-content -->
    </div>

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">
                <i class="fas fa-chart-pie mr-1"></i>
                Sales
            </h3>
            <div class="card-tools">
                <ul class="nav nav-pills ml-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="#revenue-chart" data-toggle="tab">Area</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#sales-chart" data-toggle="tab">Donut</a>
                    </li>
                </ul>
            </div>
        </div><!-- /.card-header -->
        <div class="card-body">
            <div class="tab-content p-0">
                <!-- Morris chart - Sales -->
                <div class="chart tab-pane active" id="revenue-chart"
                     style="position: relative; height: 300px;">
                    <canvas id="revenue-chart-canvas" height="300" style="height: 300px;"></canvas>
                </div>
                <div class="chart tab-pane" id="sales-chart" style="position: relative; height: 300px;">
                    <canvas id="sales-chart-canvas" height="300" style="height: 300px;"></canvas>
                </div>
            </div>
        </div><!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>