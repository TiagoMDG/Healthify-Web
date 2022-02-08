<?php

use app\models\Reviews;
use frontend\models\Userprofile;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ReviewsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $reviews */


$this->title = 'Reviews';
?>
<div class="reviews-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <table class="table">
        <thead>
        <th><h3>Cliente</h3></th>
        <th><h3>Rating</h3></th>
        <th><h3>Review</h3></th>
        </thead>
        <?php foreach ($reviews as $review) { ?>
            <tr>
                <td><?= Userprofile::getNameWithID($review->userprofilesid) ?></td>
                <td><?= Reviews::stars($review->rating) ?></td>
                <td><?= $review->review ?></td>
            </tr>
        <?php } ?>
    </table>


</div>
