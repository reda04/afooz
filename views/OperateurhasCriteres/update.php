<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\OperateurhasCriteres */

$this->title = 'Update Operateurhas Criteres: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Operateurhas Criteres', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id, 'critere_id' => $model->critere_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="operateurhas-criteres-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
