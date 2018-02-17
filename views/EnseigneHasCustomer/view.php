<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\EnseigneHasCustomer */

$this->title = $model->enseigne_id;
$this->params['breadcrumbs'][] = ['label' => 'Enseigne Has Customers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="enseigne-has-customer-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'enseigne_id' => $model->enseigne_id, 'enseigne_has_customer_id' => $model->enseigne_has_customer_id, 'customer_id' => $model->customer_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'enseigne_id' => $model->enseigne_id, 'enseigne_has_customer_id' => $model->enseigne_has_customer_id, 'customer_id' => $model->customer_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'enseigne_id',
            'enseigne_has_customer_id',
            'customer_id',
            'created_at',
            'number_points_sum',
        ],
    ]) ?>

</div>
