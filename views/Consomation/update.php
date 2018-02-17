<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Consomation */

$this->title = 'Update Consomation: ' . $model->enseigne_has_customer_id;
$this->params['breadcrumbs'][] = ['label' => 'Consomations', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->enseigne_has_customer_id, 'url' => ['view', 'enseigne_has_customer_id' => $model->enseigne_has_customer_id, 'enseigne_id' => $model->enseigne_id, 'point_de_vente_id' => $model->point_de_vente_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="consomation-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
