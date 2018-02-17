<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Consomation */

$this->title = $model->enseigne_has_customer_id;
$this->params['breadcrumbs'][] = ['label' => 'Consomations', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="consomation-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'enseigne_has_customer_id' => $model->enseigne_has_customer_id, 'enseigne_id' => $model->enseigne_id, 'point_de_vente_id' => $model->point_de_vente_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'enseigne_has_customer_id' => $model->enseigne_has_customer_id, 'enseigne_id' => $model->enseigne_id, 'point_de_vente_id' => $model->point_de_vente_id], [
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
            'enseigne_has_customer_id',
            'enseigne_id',
            'point_de_vente_id',
            'date_conso',
            'type_operation',
            'points',
            'offer_id',
            'description',
        ],
    ]) ?>

</div>
