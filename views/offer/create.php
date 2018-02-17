<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\offer */

$this->title = 'Ajouter une offre';
$this->params['breadcrumbs'][] = ['label' => 'Offers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="offer-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
