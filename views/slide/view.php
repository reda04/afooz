<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Slide */

$this->title = $model->slide_id;
$this->params['breadcrumbs'][] = ['label' => 'Slides', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="slide-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'slide_id' => $model->slide_id, 'enseigne_enseigne_id' => $model->enseigne_enseigne_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'slide_id' => $model->slide_id, 'enseigne_enseigne_id' => $model->enseigne_enseigne_id], [
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
            'slide_id',
            'filename',
            'enseigne_enseigne_id',
        ],
    ]) ?>

</div>
