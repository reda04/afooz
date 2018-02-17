<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Filter */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Filters', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="filter-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->filter_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->filter_id], [
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
            'filter_id',
            'name',
            'statut',
            'operation',
            'requete',
            'point_de_vente_id',
            'enseigne_id',
        ],
    ]) ?>

</div>
