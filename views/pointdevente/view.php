<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Pointdevente */

$this->title = $model->point_de_vente_id;
$this->params['breadcrumbs'][] = ['label' => 'Pointdeventes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pointdevente-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->point_de_vente_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->point_de_vente_id], [
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
            'point_de_vente_id',
            'nom',
            'adresse',
            'lattitude',
            'longitude',
        ],
    ]) ?>

</div>
