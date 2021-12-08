<?php

use yii\bootstrap4;
use yii\helpers\URL;
use yii\helpers\Html;
use yii\widgets\Menu;

?>
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?= Url::home() ?>" class="brand-link">
        <img src="<?= $assetDir ?>/img/AdminLTELogo.png" alt="Healthify Logo" class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
        <span class="brand-text font-weight-light">Healthify</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <table style="width: 100%" align="center">
                <tr>
                    <td rowspan="2" align="center"><img src="<?= $assetDir ?>/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image" width="120px" height="120px"></td>
                    <td><a href="#" class="d-block"><?= Yii::$app->getUser()->identity->getName() ?></td>
                </tr>
                <tr>
                    <td><?= Html::a('Sign out ', ['site/logout'], ['data-method' => 'post', 'class' => 'nav-icon']) ?></td>
                </tr>
            </table>
        </div>

        <!-- Sidebar Menu -->

        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <?= HTML::a('meal_ingredients', ['meal-ingredients/index'], ['data-method' => 'post', 'class' => 'nav-link']) ?>
                </li>

                <li class="nav-item">
                    <?= HTML::a('Gestor de Utilizadores', ['user/index'], ['data-method' => 'post', 'class' => 'nav-link']) ?>
                </li>

                <li class="nav-item">
                    <?= Html::a('Lista de Ingredientes', ['ingredients/index'], ['data-method' => 'post', 'class' => 'nav-link']) ?>
                </li>

                <li class="nav-item">
                    <?= Html::a('Mesas', ['tables/index'], ['data-method' => 'post', 'class' => 'nav-link']) ?>
                </li>

                <li class="nav-item">
                    <?= Html::a('Reservas', ['reservations/index'], ['data-method' => 'post', 'class' => 'nav-link']) ?>
                </li>

                <li class="nav-item">
                    <button class="dropdown-btn nav-link"><?= Html::a('Gerir Ementa', ['meals/index', 'meal' => $meal = 'entree'], ['data-method' => 'post']) ?>
                        <i class="fa fa-caret-down"></i>
                    </button>
                    <div class="dropdown-container">
                        <?= Html::a('Entradas', ['meals/category', 'meal' => $meal = 'entree'], ['data-method' => 'post', 'class' => 'nav-link']) ?>
                        <?= Html::a('Sopas', ['meals/category', 'meal' => $meal = 'soup'], ['data-method' => 'post', 'class' => 'nav-link']) ?>
                        <?= Html::a('Carne', ['meals/category', 'meal' => $meal = 'meat'], ['data-method' => 'post', 'class' => 'nav-link']) ?>
                        <?= Html::a('peixe', ['meals/category', 'meal' => $meal = 'fish'], ['data-method' => 'post', 'class' => 'nav-link']) ?>
                        <?= Html::a('Vegan', ['meals/category', 'meal' => $meal = 'vegan'], ['data-method' => 'post', 'class' => 'nav-link']) ?>
                        <?= Html::a('Bebidas', ['meals/category', 'meal' => $meal = 'drinks'], ['data-method' => 'post', 'class' => 'nav-link']) ?>
                        <?= Html::a('Sobremesa', ['meals/category', 'meal' => $meal = 'dessert'], ['data-method' => 'post', 'class' => 'nav-link']) ?>
                    </div>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>