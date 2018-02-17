<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\FilterhasCriteres */

$this->title = $model->filter_id;
$this->params['breadcrumbs'][] = ['label' => 'Filterhas Criteres', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="filterhas-criteres-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'filter_id' => $model->filter_id, 'operateur_has_criteres_id' => $model->operateur_has_criteres_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'filter_id' => $model->filter_id, 'operateur_has_criteres_id' => $model->operateur_has_criteres_id], [
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
            'operateur_has_criteres_id',
            'selected_value',
        ],
    ]) ?>

</div>
