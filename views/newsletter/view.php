<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Newsletter */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Newsletters', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="newsletter-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'newsletter_id' => $model->newsletter_id, 'point_de_vente_id' => $model->point_de_vente_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'newsletter_id' => $model->newsletter_id, 'point_de_vente_id' => $model->point_de_vente_id], [
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
            'newsletter_id',
            'send_on',
            'title',
            'point_de_vente_id',
        ],
    ]) ?>

</div>
