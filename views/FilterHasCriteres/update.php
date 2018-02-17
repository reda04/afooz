<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\FilterhasCriteres */

$this->title = 'Update Filterhas Criteres: ' . $model->filter_id;
$this->params['breadcrumbs'][] = ['label' => 'Filterhas Criteres', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->filter_id, 'url' => ['view', 'filter_id' => $model->filter_id, 'operateur_has_criteres_id' => $model->operateur_has_criteres_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="filterhas-criteres-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
