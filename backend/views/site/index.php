<?php

use hail812\adminlte3\widgets\Alert;
use hail812\adminlte3\widgets\Callout;

$this->title = 'Zona Administrativa';
$this->params['breadcrumbs'] = [['label' => $this->title]];
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-6">
            <?= Alert::widget([
                'type' => 'success',
                'body' => '<h3>Welcome!!!</h3>',
            ]) ?>

            <?= Callout::widget([
                'type' => 'danger',
                'head' => 'I am a danger callout!',
                'body' => 'There is a problem that we need to fix. A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart.'
            ]) ?>
        </div>
    </div>
</div>