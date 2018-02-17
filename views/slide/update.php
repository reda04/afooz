<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Slide */

$this->title = 'Update Slide: ' . $model->slide_id;
$this->params['breadcrumbs'][] = ['label' => 'Slides', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->slide_id, 'url' => ['view', 'slide_id' => $model->slide_id, 'enseigne_enseigne_id' => $model->enseigne_enseigne_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="slide-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
