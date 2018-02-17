<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\EnseigneHasCustomer */

$this->title = 'Create Enseigne Has Customer';
$this->params['breadcrumbs'][] = ['label' => 'Enseigne Has Customers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="enseigne-has-customer-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
