<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\offer */

$this->title = 'Update Offer: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Offers', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->offer_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="offer-update">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
