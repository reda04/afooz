<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\FilterhasCriteres */

$this->title = 'Create Filterhas Criteres';
$this->params['breadcrumbs'][] = ['label' => 'Filterhas Criteres', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="filterhas-criteres-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
