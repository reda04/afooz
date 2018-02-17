<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\EnseigneHasCustomer */

$this->title = 'Update Enseigne Has Customer: ' . $model->enseigne_id;
$this->params['breadcrumbs'][] = ['label' => 'Enseigne Has Customers', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->enseigne_id, 'url' => ['view', 'enseigne_id' => $model->enseigne_id, 'enseigne_has_customer_id' => $model->enseigne_has_customer_id, 'customer_id' => $model->customer_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="enseigne-has-customer-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
